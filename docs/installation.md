# Installation

## Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18.x & NPM >= 9.x
- Extensions PHP classiques (pdo, mbstring, etc.)

## Étapes d'installation

1. **Cloner le dépôt**
   ```bash
   git clone <repo-url>
   cd LarappeUI
   ```
2. **Installer les dépendances backend**
   ```bash
   composer install
   ```
3. **Installer les dépendances frontend**
   ```bash
   npm install
   ```
4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   # Adapter la config DB si besoin puis :
   php artisan migrate
   ```

Pour plus de détails, voir [Démarrage rapide](quickstart.md). 