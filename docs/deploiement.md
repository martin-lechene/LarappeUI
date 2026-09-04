# Déploiement

## État constaté sur `larrapeui.doganddev.eu`

Relevé du 4 septembre 2026. **L'application n'est pas déployée sur ce domaine.**

| Vérification | Résultat |
|---|---|
| DNS A / AAAA | `138.201.52.27` · `2a01:4f8:172:d12::2` — résout |
| `http://larrapeui.doganddev.eu/` | 200 — page statique « DOG&DEV — Écosystème », Apache, `Last-Modified` 21 août 2026 |
| `http://…/components`, `/examples`, `/up` | 404 |
| Handshake TLS | échec — `SEC_E_WRONG_PRINCIPAL` |
| Certificat servi | `CN=vetzy.eu`, SAN `vetzy.eu/.be/.ch/.fr`, `admin.`, `api.`, `asv.`, `blog.`, `jobs.`, `www.*` — **aucun SAN pour ce domaine** |
| `https://…/` | 302 vers `https://vetzy.eu/`, avec `Set-Cookie: vetzy_admin_session` |

Cause : il n'existe aucun vhost `:443` pour ce domaine. Les requêtes HTTPS retombent sur le vhost par défaut du serveur, celui de l'admin Vetzy — d'où le certificat étranger, la redirection et le cookie de session Vetzy posé sur le domaine LarappeUI.

## Procédure

### 1. Construire et déployer

Le `Dockerfile` multi-stage et son `HEALTHCHECK` sur `/up` sont exploitables tels quels.

```bash
docker compose up --build -d
```

Hors Docker, sur le serveur :

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

### 2. Configurer le vhost

`docker/apache/larrapeui.doganddev.eu.conf` contient les blocs `:80` et `:443` prêts à poser. La marche à suivre y est détaillée en en-tête.

```bash
cp docker/apache/larrapeui.doganddev.eu.conf /etc/apache2/sites-available/
a2ensite larrapeui.doganddev.eu
systemctl reload apache2
```

### 3. Émettre le certificat

Certificat dédié :

```bash
certbot --apache -d larrapeui.doganddev.eu
```

Ou extension du certificat existant :

```bash
certbot --expand -d vetzy.eu,www.vetzy.eu,larrapeui.doganddev.eu
```

### 4. Renseigner `.env`

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://larrapeui.doganddev.eu
SESSION_ENCRYPT=true
```

`APP_KEY` **doit être régénérée** : une clé a été committée dans l'historique git (voir `TODO.md`). Nettoyer l'historique avant toute mise en production.

```bash
php artisan key:generate --force
```

### 5. Vérifier

```bash
curl -I https://larrapeui.doganddev.eu/up
```

Attendu : `200`, sans erreur TLS. Puis, sur `/components` : les 88 composants affichés, 0 erreur console, 25 thèmes dans le sélecteur.

## En-têtes de sécurité

Ils sont émis par `App\Http\Middleware\SecurityHeaders`, pas par Apache — ne pas les dupliquer dans le vhost, au risque d'obtenir deux valeurs contradictoires. Seul `Strict-Transport-Security` est posé côté Apache, car il n'a de sens que sur une connexion TLS effective.

La CSP utilise un **nonce** par requête plutôt que `unsafe-inline`. `unsafe-eval` reste nécessaire : Alpine compile ses expressions avec le constructeur `Function`.

Origines externes autorisées :

| Origine | Usage |
|---|---|
| `cdnjs.cloudflare.com` | Prism.js et son autoloader (grammaires chargées à la demande) |
| `fonts.googleapis.com` / `fonts.gstatic.com` | police Instrument Sans |
| `picsum.photos` | images des démos `gallery` et `media` |

Toute balise `<script>` inline ajoutée à une vue doit porter le nonce :

```blade
<script nonce="{{ request()->attributes->get('csp_nonce') }}">
```

Sans lui, le navigateur bloquera le script en production.
