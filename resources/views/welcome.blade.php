@extends('layouts.app')

@section('content')
    <section id="components" class="mb-16">
        <div class="space-y-10">
            {{-- BUTTON --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Button</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button>Défaut</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button color="secondary">Secondaire</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button color="danger">Danger</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button size="sm">Petit</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button size="lg">Grand</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button icon="<svg class='w-4 h-4' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'></path></svg>">Avec icône</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button loading>Chargement</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button disabled>Désactivé</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button outline>Outline</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button block>Block</x-form.button>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-button type="submit">Type submit</x-form.button>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-button&gt;Défaut&lt;/x-button&gt;
&lt;x-button color=&quot;secondary&quot;&gt;Secondaire&lt;/x-button&gt;
&lt;x-button color=&quot;danger&quot;&gt;Danger&lt;/x-button&gt;
&lt;x-button size=&quot;sm&quot;&gt;Petit&lt;/x-button&gt;
&lt;x-button size=&quot;lg&quot;&gt;Grand&lt;/x-button&gt;
&lt;x-button icon=&quot;...svg...&quot;&gt;Avec icône&lt;/x-button&gt;
&lt;x-button loading&gt;Chargement&lt;/x-button&gt;
&lt;x-button disabled&gt;Désactivé&lt;/x-button&gt;
&lt;x-button outline&gt;Outline&lt;/x-button&gt;
&lt;x-button block&gt;Block&lt;/x-button&gt;
&lt;x-button type=&quot;submit&quot;&gt;Type submit&lt;/x-button&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>label</b> (string, optionnel) : Texte du bouton (ou slot)</li>
                            <li><b>color</b> (string, défaut: 'primary') : Couleur (primary, secondary, danger...)</li>
                            <li><b>size</b> (string, défaut: 'md') : Taille (sm, md, lg)</li>
                            <li><b>icon</b> (HTML, optionnel) : Icône SVG ou HTML à gauche</li>
                            <li><b>loading</b> (bool, défaut: false) : Affiche un spinner</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le bouton</li>
                            <li><b>outline</b> (bool, défaut: false) : Style contour</li>
                            <li><b>block</b> (bool, défaut: false) : Largeur 100%</li>
                            <li><b>type</b> (string, défaut: 'button') : Type HTML</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- INPUT --}}
            <form>
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Input</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input placeholder="Votre email" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input type="password" label="Mot de passe" placeholder="••••••" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Nom" value="Martin" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Email" value="test@example.com" clearable helpText="Votre adresse email professionnelle" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Désactivé" disabled value="Disabled" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Lecture seule" readonly value="Readonly" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Erreur" error="Champ obligatoire" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Préfixe" prefix="@" placeholder="username" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Suffixe" suffix=".com" placeholder="domaine" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Autofocus" autofocus />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Maxlength" maxlength="8" value="Limité" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Minlength" minlength="4" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input type="number" label="Step" step="2" min="0" max="10" value="4" />
                        </div>
                        <!-- Exemples avancés -->
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Adresse IP v4" placeholder="192.168.0.1" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Adresse IP v6" placeholder="2001:0db8:85a3:0000:0000:8a2e:0370:7334" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Carte bancaire" placeholder="1234 5678 9012 3456" maxlength="19" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="CVV" placeholder="123" maxlength="4" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Téléphone" placeholder="+33 6 12 34 56 78" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Code postal" placeholder="75001" maxlength="10" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="IBAN" placeholder="FR76 3000 6000 0112 3456 7890 189" maxlength="34" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="SIRET" placeholder="123 456 789 00012" maxlength="14" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="SIREN" placeholder="123 456 789" maxlength="9" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Date" type="date" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Code de vérification" placeholder="123456" maxlength="6" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">OTP (inputs splittés)</label>
                            <div class="flex space-x-2">
                                <x-form.input maxlength="1" class="w-10 text-center" />
                                <x-form.input maxlength="1" class="w-10 text-center" />
                                <x-form.input maxlength="1" class="w-10 text-center" />
                                <x-form.input maxlength="1" class="w-10 text-center" />
                                <x-form.input maxlength="1" class="w-10 text-center" />
                                <x-form.input maxlength="1" class="w-10 text-center" />
                            </div>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.input label="Montant" placeholder="0.00" prefix="€" type="number" step="0.01" />
                        </div>
                        <div class="flex space-x-2 items-end">
                            <x-form.input label="Montant" placeholder="0.00" type="number" step="0.01" />
                            <x-form.select :options="['EUR', 'USD', 'GBP']" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-input placeholder=&quot;Votre email&quot; /&gt;
&lt;x-input type=&quot;password&quot; label=&quot;Mot de passe&quot; placeholder=&quot;••••••&quot; /&gt;
&lt;x-input label=&quot;Nom&quot; value=&quot;Martin&quot; /&gt;
&lt;x-input label=&quot;Email&quot; value=&quot;test@example.com&quot; clearable helpText=&quot;Votre adresse email professionnelle&quot; /&gt;
&lt;x-input label=&quot;Désactivé&quot; disabled value=&quot;Disabled&quot; /&gt;
&lt;x-input label=&quot;Lecture seule&quot; readonly value=&quot;Readonly&quot; /&gt;
&lt;x-input label=&quot;Erreur&quot; error=&quot;Champ obligatoire&quot; /&gt;
&lt;x-input label=&quot;Préfixe&quot; prefix=&quot;@&quot; placeholder=&quot;username&quot; /&gt;
&lt;x-input label=&quot;Suffixe&quot; suffix=&quot;.com&quot; placeholder=&quot;domaine&quot; /&gt;
&lt;x-input label=&quot;Autofocus&quot; autofocus /&gt;
&lt;x-input label=&quot;Maxlength&quot; maxlength=&quot;8&quot; value=&quot;Limité&quot; /&gt;
&lt;x-input label=&quot;Minlength&quot; minlength=&quot;4&quot; /&gt;
&lt;x-input type=&quot;number&quot; label=&quot;Step&quot; step=&quot;2&quot; min=&quot;0&quot; max=&quot;10&quot; value=&quot;4&quot; /&gt;
&lt;x-input label="Adresse IP v4" placeholder="192.168.0.1" /&gt;
&lt;x-input label="Adresse IP v6" placeholder="2001:0db8:85a3:0000:0000:8a2e:0370:7334" /&gt;
&lt;x-input label="Carte bancaire" placeholder="1234 5678 9012 3456" maxlength="19" /&gt;
&lt;x-input label="CVV" placeholder="123" maxlength="4" /&gt;
&lt;x-input label="Téléphone" placeholder="+33 6 12 34 56 78" /&gt;
&lt;x-input label="Code postal" placeholder="75001" maxlength="10" /&gt;
&lt;x-input label="IBAN" placeholder="FR76 3000 6000 0112 3456 7890 189" maxlength="34" /&gt;
&lt;x-input label="SIRET" placeholder="123 456 789 00012" maxlength="14" /&gt;
&lt;x-input label="SIREN" placeholder="123 456 789" maxlength="9" /&gt;
&lt;x-input label="Date" type="date" /&gt;
&lt;x-input label="Code de vérification" placeholder="123456" maxlength="6" /&gt;
&lt;div&gt;
    &lt;label class="block text-sm font-medium text-gray-700 mb-1"&gt;OTP (inputs splittés)&lt;/label&gt;
    &lt;div class="flex space-x-2"&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
        &lt;x-input maxlength="1" class="w-10 text-center" /&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;x-input label="Montant" placeholder="0.00" prefix="€" type="number" step="0.01" /&gt;
&lt;div class="flex space-x-2 items-end"&gt;
    &lt;x-input label="Montant" placeholder="0.00" type="number" step="0.01" /&gt;
    &lt;x-select :options="['EUR', 'USD', 'GBP']" /&gt;
&lt;/div&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>type</b> (string, défaut: 'text') : Type d'input (text, email, password...)</li>
                            <li><b>label</b> (string, optionnel) : Libellé affiché au-dessus</li>
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>value</b> (string, optionnel) : Valeur initiale</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>prefix</b> (HTML, optionnel) : Élément avant l'input</li>
                            <li><b>suffix</b> (HTML, optionnel) : Élément après l'input</li>
                            <li><b>clearable</b> (bool, défaut: false) : Bouton pour effacer</li>
                            <li><b>autofocus</b> (bool, défaut: false) : Autofocus</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur max</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur min</li>
                            <li><b>step</b> (int, optionnel) : Pas (pour number)</li>
                            <li><b>min</b> (int, optionnel) : Valeur min</li>
                            <li><b>max</b> (int, optionnel) : Valeur max</li>
                        </ul>
                    </div>
                </div>
            </div>
            </form>
            {{-- SELECT --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Select</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select>
                                <option value="">Sélectionner une option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Pays">
                                <option value="fr">France</option>
                                <option value="be">Belgique</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Erreur" error="Champ requis">
                                <option value="">Choisir</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Aide" helpText="Sélectionnez une valeur">
                                <option value="1">Un</option>
                                <option value="2">Deux</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Désactivé" disabled>
                                <option>Option</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Lecture seule" readonly>
                                <option>Option</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Multiple" multiple>
                                <option>Un</option>
                                <option>Deux</option>
                                <option>Trois</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Clearable" clearable>
                                <option>Un</option>
                                <option>Deux</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Autofocus" autofocus>
                                <option>Un</option>
                                <option>Deux</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Maxlength" maxlength="2">
                                <option>Un</option>
                                <option>Deux</option>
                                <option>Trois</option>
                            </x-select>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Minlength" minlength="2">
                                <option>Un</option>
                                <option>Deux</option>
                                <option>Trois</option>
                            </x-select>
                        </div>
                        <!-- Exemples avancés -->
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Pays (optgroup)" :options="[
                                ['label' => 'Europe', 'options' => [
                                    ['label' => 'France', 'value' => 'FR'],
                                    ['label' => 'Allemagne', 'value' => 'DE'],
                                ]],
                                ['label' => 'Asie', 'options' => [
                                    ['label' => 'Japon', 'value' => 'JP'],
                                    ['label' => 'Chine', 'value' => 'CN'],
                                ]],
                            ]" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Ville (asynchrone)" :options="[]" loading="true" placeholder="Chargement..." />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            @php $produits = array_map(fn($i) => 'Produit '.$i, range(1, 1000)); @endphp
                            <x-form.select label="Produit (virtual scroll)" :options="$produits" placeholder="Sélectionner un produit..." />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Technologies (recherche multi)" :options="['PHP', 'Laravel', 'Vue.js', 'React']" multiple="true" searchable="true" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.select label="Tags (taggable)" :options="['Laravel', 'PHP', 'Livewire']" multiple="true" taggable="true" placeholder="Ajouter un tag..." />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-select&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Pays&quot;&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Erreur&quot; error=&quot;Champ requis&quot;&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Aide&quot; helpText=&quot;Sélectionnez une valeur&quot;&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Désactivé&quot; disabled&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Lecture seule&quot; readonly&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Multiple&quot; multiple&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Clearable&quot; clearable&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Autofocus&quot; autofocus&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Maxlength&quot; maxlength=&quot;2&quot;&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Minlength&quot; minlength=&quot;2&quot;&gt;...&lt;/x-select&gt;
&lt;x-select label=&quot;Pays (optgroup)&quot; :options="[['label' => 'Europe', 'options' => [['label' => 'France', 'value' => 'FR'], ['label' => 'Allemagne', 'value' => 'DE']]], ['label' => 'Asie', 'options' => [['label' => 'Japon', 'value' => 'JP'], ['label' => 'Chine', 'value' => 'CN']]]]" /&gt;
&lt;x-select label=&quot;Ville (asynchrone)&quot; :options="[]" loading="true" placeholder="Chargement..." /&gt;
&lt;x-select label=&quot;Produit (virtual scroll)&quot; :options="['Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5', 'Produit 6', 'Produit 7', 'Produit 8', 'Produit 9', 'Produit 10']" placeholder="Sélectionner un produit..." /&gt;
&lt;x-select label=&quot;Technologies (recherche multi)&quot; :options="['PHP', 'Laravel', 'Vue.js', 'React']" multiple="true" searchable="true" /&gt;
&lt;x-select label=&quot;Tags (taggable)&quot; :options="['Laravel', 'PHP', 'Livewire']" multiple="true" taggable="true" placeholder="Ajouter un tag..." /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>label</b> (string, optionnel) : Libellé affiché au-dessus</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>multiple</b> (bool, défaut: false) : Permet la sélection multiple</li>
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>clearable</b> (bool, défaut: false) : Bouton pour effacer</li>
                            <li><b>autofocus</b> (bool, défaut: false) : Autofocus</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur max</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur min</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- CHECKBOX --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Checkbox</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.checkbox label="Accepter les conditions" checked />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.checkbox label="Désactivé" disabled />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.checkbox label="Lecture seule" readonly />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.checkbox label="Erreur" error="Message d'erreur" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.checkbox label="Aide" helpText="Texte d'aide" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-checkbox label="Accepter les conditions" checked /&gt;
&lt;x-checkbox label="Désactivé" disabled /&gt;
&lt;x-checkbox label="Lecture seule" readonly /&gt;
&lt;x-checkbox label="Erreur" error="Message d'erreur" /&gt;
&lt;x-checkbox label="Aide" helpText="Texte d'aide" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>label</b> (string, optionnel) : Texte du label</li>
                            <li><b>checked</b> (bool, défaut: false) : Indique si la case est cochée</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- RADIO --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Radio</h3>
                    <div class="space-y-4">
                        <x-form.radio name="radio-demo" :options="[['label'=>'Option cochée','value'=>'1'],['label'=>'Option 2','value'=>'2']]" value="1" label="Choix simple" />
                        <x-form.radio name="radio-demo2" :options="[['label'=>'Désactivé','value'=>'1']]" value="1" label="Désactivé" disabled />
                        <x-form.radio name="radio-demo3" :options="[['label'=>'Lecture seule','value'=>'1']]" value="1" label="Lecture seule" readonly />
                        <x-form.radio name="radio-demo4" :options="[['label'=>'Erreur','value'=>'1']]" value="1" label="Erreur" error="Message d'erreur" />
                        <x-form.radio name="radio-demo5" :options="[['label'=>'Aide','value'=>'1']]" value="1" label="Aide" helpText="Texte d'aide" />
                        <x-form.radio name="radio-demo6" :options="[['label'=>'Inline 1','value'=>'1'],['label'=>'Inline 2','value'=>'2']]" value="2" label="Inline" inline />
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-radio name="radio-demo" :options="[['label'=&gt;'Option cochée','value'=&gt;'1'],['label'=&gt;'Option 2','value'=&gt;'2']]" value="1" label="Choix simple" /&gt;
&lt;x-radio name="radio-demo2" :options="[['label'=&gt;'Désactivé','value'=&gt;'1']]" value="1" label="Désactivé" disabled /&gt;
&lt;x-radio name="radio-demo3" :options="[['label'=&gt;'Lecture seule','value'=&gt;'1']]" value="1" label="Lecture seule" readonly /&gt;
&lt;x-radio name="radio-demo4" :options="[['label'=&gt;'Erreur','value'=&gt;'1']]" value="1" label="Erreur" error="Message d'erreur" /&gt;
&lt;x-radio name="radio-demo5" :options="[['label'=&gt;'Aide','value'=&gt;'1']]" value="1" label="Aide" helpText="Texte d'aide" /&gt;
&lt;x-radio name="radio-demo6" :options="[['label'=&gt;'Inline 1','value'=&gt;'1'],['label'=&gt;'Inline 2','value'=&gt;'2']]" value="2" label="Inline" inline /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>options</b> (array) : Liste des options [{label, value}]</li>
                            <li><b>name</b> (string) : Nom du groupe de radio</li>
                            <li><b>label</b> (string, optionnel) : Texte du label</li>
                            <li><b>value</b> (string|int, optionnel) : Valeur sélectionnée</li>
                            <li><b>inline</b> (bool, défaut: false) : Affichage en ligne</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SWITCH --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Switch</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.switch checked />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.switch disabled />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.switch readonly />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.switch error="Message d'erreur" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.switch helpText="Texte d'aide" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-switch checked /&gt;
&lt;x-switch disabled /&gt;
&lt;x-switch readonly /&gt;
&lt;x-switch error="Message d'erreur" /&gt;
&lt;x-switch helpText="Texte d'aide" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>checked</b> (bool, défaut: false) : Indique si le switch est coché</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- TEXTAREA --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Textarea</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="2">Texte ici...</x-form.textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="4" placeholder="Placeholder">Texte avec placeholder</x-form.textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" disabled>Désactivé</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" readonly>Lecture seule</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" error="Message d'erreur">Avec erreur</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" helpText="Texte d'aide">Avec aide</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" maxlength="100">Max 100 caractères</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" minlength="10">Min 10 caractères</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" autofocus>Autofocus</x-textarea>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.textarea rows="3" required>Obligatoire</x-textarea>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-textarea rows="2"&gt;Texte ici...&lt;/x-textarea&gt;
&lt;x-textarea rows="4" placeholder="Placeholder"&gt;Texte avec placeholder&lt;/x-textarea&gt;
&lt;x-textarea rows="3" disabled&gt;Désactivé&lt;/x-textarea&gt;
&lt;x-textarea rows="3" readonly&gt;Lecture seule&lt;/x-textarea&gt;
&lt;x-textarea rows="3" error="Message d'erreur"&gt;Avec erreur&lt;/x-textarea&gt;
&lt;x-textarea rows="3" helpText="Texte d'aide"&gt;Avec aide&lt;/x-textarea&gt;
&lt;x-textarea rows="3" maxlength="100"&gt;Max 100 caractères&lt;/x-textarea&gt;
&lt;x-textarea rows="3" minlength="10"&gt;Min 10 caractères&lt;/x-textarea&gt;
&lt;x-textarea rows="3" autofocus&gt;Autofocus&lt;/x-textarea&gt;
&lt;x-textarea rows="3" required&gt;Obligatoire&lt;/x-textarea&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>rows</b> (int, défaut: 3) : Nombre de lignes</li>
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur maximale</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur minimale</li>
                            <li><b>autofocus</b> (bool, défaut: false) : Focus automatique</li>
                            <li><b>required</b> (bool, défaut: false) : Champ obligatoire</li>
                            <li><b>name</b> (string, optionnel) : Nom du champ</li>
                            <li><b>id</b> (string, optionnel) : ID du champ</li>
                            <li><b>class</b> (string, optionnel) : Classes CSS</li>
                            <li><b>style</b> (string, optionnel) : Styles CSS inline</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors du changement</li>
                            <li><b>onFocus</b> (function, optionnel) : Callback lors du focus</li>
                            <li><b>onBlur</b> (function, optionnel) : Callback lors de la perte de focus</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- BADGE --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Badge</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.badge>Badge</x-badge>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.badge color="secondary">Secondaire</x-badge>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.badge color="danger">Danger</x-badge>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.badge size="sm">Petit</x-badge>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.badge size="lg">Grand</x-badge>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-badge&gt;Badge&lt;/x-badge&gt;
&lt;x-badge color="secondary"&gt;Secondaire&lt;/x-badge&gt;
&lt;x-badge color="danger"&gt;Danger&lt;/x-badge&gt;
&lt;x-badge size="sm"&gt;Petit&lt;/x-badge&gt;
&lt;x-badge size="lg"&gt;Grand&lt;/x-badge&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>color</b> (string, optionnel) : Couleur (primary, secondary, danger...)</li>
                            <li><b>size</b> (string, optionnel) : Taille (sm, md, lg)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- AVATAR --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Avatar</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-media.avatar>JD</x-avatar>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-media.avatar size="sm">SM</x-avatar>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-media.avatar size="lg">LG</x-avatar>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-avatar&gt;JD&lt;/x-avatar&gt;
&lt;x-avatar size="sm"&gt;SM&lt;/x-avatar&gt;
&lt;x-avatar size="lg"&gt;LG&lt;/x-avatar&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>size</b> (string, optionnel) : Taille (sm, md, lg)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- BREADCRUMBS --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Breadcrumbs</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-navigation.breadcrumbs><li>Accueil</li><li>Section</li><li>Page</li></x-breadcrumbs>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-navigation.breadcrumbs separator=">"><li>Accueil</li><li>Section</li><li>Page</li></x-breadcrumbs>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-breadcrumbs&gt;&lt;li&gt;Accueil&lt;/li&gt;&lt;li&gt;Section&lt;/li&gt;&lt;li&gt;Page&lt;/li&gt;&lt;/x-breadcrumbs&gt;
&lt;x-breadcrumbs separator="&gt;"&gt;&lt;li&gt;Accueil&lt;/li&gt;&lt;li&gt;Section&lt;/li&gt;&lt;li&gt;Page&lt;/li&gt;&lt;/x-breadcrumbs&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>separator</b> (string, optionnel) : Séparateur entre les éléments</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- PROGRESS --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Progress</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.progress value="60" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.progress value="30" max="80" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.progress value="80" color="danger" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.progress value="40" size="sm" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.progress value="90" size="lg" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-progress value="60" /&gt;
&lt;x-progress value="30" max="80" /&gt;
&lt;x-progress value="80" color="danger" /&gt;
&lt;x-progress value="40" size="sm" /&gt;
&lt;x-progress value="90" size="lg" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>value</b> (int, défaut: 0) : Valeur actuelle</li>
                            <li><b>max</b> (int, optionnel) : Valeur maximale</li>
                            <li><b>color</b> (string, optionnel) : Couleur (primary, secondary, danger...)</li>
                            <li><b>size</b> (string, optionnel) : Taille (sm, md, lg)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SPINNER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Spinner</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.spinner />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.spinner size="sm" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.spinner size="lg" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-spinner /&gt;
&lt;x-spinner size="sm" /&gt;
&lt;x-spinner size="lg" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>size</b> (string, optionnel) : Taille (sm, md, lg)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- COLLAPSE --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Collapse</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.collapse><div class="p-2">Contenu repliable</div></x-collapse>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.collapse open><div class="p-2">Ouvert</div></x-collapse>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.collapse alwaysOpen><div class="p-2">Toujours ouvert</div></x-collapse>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.collapse transition="height 0.5s"><div class="p-2">Transition personnalisée</div></x-collapse>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-collapse&gt;&lt;div class="p-2"&gt;Contenu repliable&lt;/div&gt;&lt;/x-collapse&gt;
&lt;x-collapse open&gt;&lt;div class="p-2"&gt;Ouvert&lt;/div&gt;&lt;/x-collapse&gt;
&lt;x-collapse alwaysOpen&gt;&lt;div class="p-2"&gt;Toujours ouvert&lt;/div&gt;&lt;/x-collapse&gt;
&lt;x-collapse transition="height 0.5s"&gt;&lt;div class="p-2"&gt;Transition personnalisée&lt;/div&gt;&lt;/x-collapse&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>open</b> (bool, défaut: false) : Indique si le contenu est ouvert</li>
                            <li><b>alwaysOpen</b> (bool, défaut: false) : Force l'ouverture</li>
                            <li><b>transition</b> (string, optionnel) : Transition CSS</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- PAGINATION --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Pagination</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination total="100" perPage="10" currentPage="2" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination showNumbers="false" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination showFirstLast="false" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination showPrevNext="false" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination showEllipsis="false" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination ellipsis="..." />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.pagination prevText="Précédent" nextText="Suivant" firstText="Début" lastText="Fin" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-pagination total="100" perPage="10" currentPage="2" /&gt;
&lt;x-pagination showNumbers="false" /&gt;
&lt;x-pagination showFirstLast="false" /&gt;
&lt;x-pagination showPrevNext="false" /&gt;
&lt;x-pagination showEllipsis="false" /&gt;
&lt;x-pagination ellipsis="..." /&gt;
&lt;x-pagination prevText="Précédent" nextText="Suivant" firstText="Début" lastText="Fin" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>total</b> (int, optionnel) : Nombre total d'éléments</li>
                            <li><b>perPage</b> (int, optionnel) : Nombre d'éléments par page</li>
                            <li><b>currentPage</b> (int, optionnel) : Page actuelle</li>
                            <li><b>showNumbers</b> (bool, défaut: true) : Affiche les numéros de page</li>
                            <li><b>showFirstLast</b> (bool, défaut: true) : Affiche les liens "Première" et "Dernière"</li>
                            <li><b>showPrevNext</b> (bool, défaut: true) : Affiche les liens "Précédent" et "Suivant"</li>
                            <li><b>showEllipsis</b> (bool, défaut: true) : Affiche les points de suspension</li>
                            <li><b>ellipsis</b> (string, optionnel) : Texte des points de suspension</li>
                            <li><b>prevText</b> (string, optionnel) : Texte du lien "Précédent"</li>
                            <li><b>nextText</b> (string, optionnel) : Texte du lien "Suivant"</li>
                            <li><b>firstText</b> (string, optionnel) : Texte du lien "Première"</li>
                            <li><b>lastText</b> (string, optionnel) : Texte du lien "Dernière"</li>
                            <li><b>onPageChange</b> (function, optionnel) : Callback lors du changement de page</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- TOOLTIP --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Tooltip</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Astuce !"><x-button>Survolez-moi</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="En bas" placement="bottom"><x-button>Placement bas</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="À gauche" placement="left"><x-button>Placement gauche</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="À droite" placement="right"><x-button>Placement droite</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Au clic" trigger="click"><x-button>Trigger clic</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Au focus" trigger="focus"><x-button>Trigger focus</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Délai 2s" delay="2000"><x-button>Délai 2s</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Décalage 20px" offset="20"><x-button>Décalage</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Sans flèche" arrow="false"><x-button>Sans flèche</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Non interactif" interactive="false"><x-button>Non interactif</x-button></x-tooltip>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.tooltip content="Bordure 10px" interactiveBorder="10"><x-button>Bordure interactive</x-button></x-tooltip>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-tooltip content="Astuce !"&gt;&lt;x-button&gt;Survolez-moi&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="En bas" placement="bottom"&gt;&lt;x-button&gt;Placement bas&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="À gauche" placement="left"&gt;&lt;x-button&gt;Placement gauche&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="À droite" placement="right"&gt;&lt;x-button&gt;Placement droite&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Au clic" trigger="click"&gt;&lt;x-button&gt;Trigger clic&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Au focus" trigger="focus"&gt;&lt;x-button&gt;Trigger focus&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Délai 2s" delay="2000"&gt;&lt;x-button&gt;Délai 2s&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Décalage 20px" offset="20"&gt;&lt;x-button&gt;Décalage&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Sans flèche" arrow="false"&gt;&lt;x-button&gt;Sans flèche&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Non interactif" interactive="false"&gt;&lt;x-button&gt;Non interactif&lt;/x-button&gt;&lt;/x-tooltip&gt;
&lt;x-tooltip content="Bordure 10px" interactiveBorder="10"&gt;&lt;x-button&gt;Bordure interactive&lt;/x-button&gt;&lt;/x-tooltip&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>content</b> (string) : Contenu du tooltip</li>
                            <li><b>placement</b> (string, défaut: 'top') : Position du tooltip (top, bottom, left, right)</li>
                            <li><b>trigger</b> (string, défaut: 'hover') : Déclencheur (hover, click, focus)</li>
                            <li><b>delay</b> (int, optionnel) : Délai en millisecondes avant l'affichage</li>
                            <li><b>offset</b> (int, optionnel) : Décalage en pixels</li>
                            <li><b>arrow</b> (bool, défaut: true) : Affiche une flèche</li>
                            <li><b>interactive</b> (bool, défaut: true) : Permet le tooltip à l'intérieur</li>
                            <li><b>interactiveBorder</b> (int, optionnel) : Bordure interactive en pixels</li>
                            <li><b>theme</b> (string, optionnel) : Thème du tooltip (light, dark)</li>
                            <li><b>animation</b> (string, optionnel) : Animation (fade, scale, shift)</li>
                            <li><b>duration</b> (int, optionnel) : Durée de l'animation en ms</li>
                            <li><b>zIndex</b> (int, optionnel) : Index z du tooltip</li>
                            <li><b>onShow</b> (function, optionnel) : Callback lors de l'affichage</li>
                            <li><b>onHide</b> (function, optionnel) : Callback lors de la fermeture</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- DIVIDER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Divider</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider orientation="vertical" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider color="primary" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider color="secondary" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider color="danger" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider size="sm" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider size="lg" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider dashed />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider dotted />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.divider text="Ou">Texte au centre</x-divider>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-divider /&gt;
&lt;x-divider orientation="vertical" /&gt;
&lt;x-divider color="primary" /&gt;
&lt;x-divider color="secondary" /&gt;
&lt;x-divider color="danger" /&gt;
&lt;x-divider size="sm" /&gt;
&lt;x-divider size="lg" /&gt;
&lt;x-divider dashed /&gt;
&lt;x-divider dotted /&gt;
&lt;x-divider text="Ou"&gt;Texte au centre&lt;/x-divider&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>orientation</b> (string, défaut: 'horizontal') : Orientation (horizontal, vertical)</li>
                            <li><b>color</b> (string, optionnel) : Couleur (primary, secondary, danger, warning, success, info)</li>
                            <li><b>size</b> (string, défaut: 'md') : Taille (sm, md, lg)</li>
                            <li><b>dashed</b> (bool, défaut: false) : Style pointillé</li>
                            <li><b>dotted</b> (bool, défaut: false) : Style pointé</li>
                            <li><b>text</b> (string, optionnel) : Texte à afficher au centre</li>
                            <li><b>textPosition</b> (string, défaut: 'center') : Position du texte (left, center, right)</li>
                            <li><b>margin</b> (string, optionnel) : Marge (sm, md, lg)</li>
                            <li><b>className</b> (string, optionnel) : Classes CSS personnalisées</li>
                            <li><b>style</b> (string, optionnel) : Styles CSS inline</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- POPOVER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Popover</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Contenu du popover"><x-button>Popover</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="En bas" placement="bottom"><x-button>Placement bas</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="À gauche" placement="left"><x-button>Placement gauche</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="À droite" placement="right"><x-button>Placement droite</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Au clic" trigger="click"><x-button>Trigger clic</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Au focus" trigger="focus"><x-button>Trigger focus</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Délai 2s" delay="2000"><x-button>Délai 2s</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Décalage 20px" offset="20"><x-button>Décalage</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Sans flèche" arrow="false"><x-button>Sans flèche</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Non interactif" interactive="false"><x-button>Non interactif</x-button></x-popover>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.popover content="Bordure 10px" interactiveBorder="10"><x-button>Bordure interactive</x-button></x-popover>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-popover content="Contenu du popover"&gt;&lt;x-button&gt;Popover&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="En bas" placement="bottom"&gt;&lt;x-button&gt;Placement bas&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="À gauche" placement="left"&gt;&lt;x-button&gt;Placement gauche&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="À droite" placement="right"&gt;&lt;x-button&gt;Placement droite&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Au clic" trigger="click"&gt;&lt;x-button&gt;Trigger clic&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Au focus" trigger="focus"&gt;&lt;x-button&gt;Trigger focus&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Délai 2s" delay="2000"&gt;&lt;x-button&gt;Délai 2s&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Décalage 20px" offset="20"&gt;&lt;x-button&gt;Décalage&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Sans flèche" arrow="false"&gt;&lt;x-button&gt;Sans flèche&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Non interactif" interactive="false"&gt;&lt;x-button&gt;Non interactif&lt;/x-button&gt;&lt;/x-popover&gt;
&lt;x-popover content="Bordure 10px" interactiveBorder="10"&gt;&lt;x-button&gt;Bordure interactive&lt;/x-button&gt;&lt;/x-popover&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>content</b> (string) : Contenu du popover</li>
                            <li><b>placement</b> (string, défaut: 'top') : Position du popover (top, bottom, left, right)</li>
                            <li><b>trigger</b> (string, défaut: 'hover') : Déclencheur (hover, click, focus)</li>
                            <li><b>delay</b> (int, optionnel) : Délai en millisecondes avant l'affichage</li>
                            <li><b>offset</b> (int, optionnel) : Décalage en pixels</li>
                            <li><b>arrow</b> (bool, défaut: true) : Affiche une flèche</li>
                            <li><b>interactive</b> (bool, défaut: true) : Permet le popover à l'intérieur</li>
                            <li><b>interactiveBorder</b> (int, optionnel) : Bordure interactive en pixels</li>
                            <li><b>theme</b> (string, optionnel) : Thème du popover (light, dark)</li>
                            <li><b>animation</b> (string, optionnel) : Animation (fade, scale, shift)</li>
                            <li><b>duration</b> (int, optionnel) : Durée de l'animation en ms</li>
                            <li><b>zIndex</b> (int, optionnel) : Index z du popover</li>
                            <li><b>onShow</b> (function, optionnel) : Callback lors de l'affichage</li>
                            <li><b>onHide</b> (function, optionnel) : Callback lors de la fermeture</li>
                            <li><b>className</b> (string, optionnel) : Classes CSS personnalisées</li>
                            <li><b>style</b> (string, optionnel) : Styles CSS inline</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- DROPDOWN --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Dropdown</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-dropdown><x-button>Dropdown</x-button></x-dropdown>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-dropdown&gt;&lt;x-button&gt;Dropdown&lt;/x-button&gt;&lt;/x-dropdown&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>content</b> (string) : Contenu du dropdown</li>
                            <li><b>placement</b> (string, défaut: 'top') : Position du dropdown (top, bottom, left, right)</li>
                            <li><b>trigger</b> (string, défaut: 'hover') : Déclencheur (hover, click, focus)</li>
                            <li><b>delay</b> (int, optionnel) : Délai en millisecondes avant l'affichage</li>
                            <li><b>offset</b> (int, optionnel) : Décalage en pixels</li>
                            <li><b>arrow</b> (bool, défaut: true) : Affiche une flèche</li>
                            <li><b>interactive</b> (bool, défaut: true) : Permet le dropdown à l'intérieur</li>
                            <li><b>interactiveBorder</b> (int, optionnel) : Bordure interactive en pixels</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- STEPPER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Stepper</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-data.stepper><span>Étape 1</span><span>Étape 2</span></x-stepper>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-stepper&gt;&lt;span&gt;Étape 1&lt;/span&gt;&lt;span&gt;Étape 2&lt;/span&gt;&lt;/x-stepper&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>activeStep</b> (int, défaut: 0) : Étape active</li>
                            <li><b>completedSteps</b> (array, optionnel) : Étapes complétées</li>
                            <li><b>onStepChange</b> (function, optionnel) : Callback lors du changement d'étape</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- STEPPER (exemples exhaustifs) --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Stepper (toutes variantes)</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.stepper :steps="[['label'=>'Étape 1'],['label'=>'Étape 2'],['label'=>'Étape 3']]" current="1" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.stepper :steps="[['label'=>'A','icon'=>'<svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><circle cx=\'12\' cy=\'12\' r=\'10\' /></svg>'],['label'=>'B'],['label'=>'C']]" current="2" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.stepper :steps="[['label'=>'Un'],['label'=>'Deux'],['label'=>'Trois'],['label'=>'Quatre']]" current="3" direction="vertical" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-data.stepper :steps="[['label'=&gt;'Étape 1'],['label'=&gt;'Étape 2'],['label'=&gt;'Étape 3']]" current="1" /&gt;
&lt;x-data.stepper :steps="[['label'=&gt;'A','icon'=&gt;'<svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><circle cx=\'12\' cy=\'12\' r=\'10\' /></svg>'],['label'=&gt;'B'],['label'=&gt;'C']]" current="2" /&gt;
&lt;x-data.stepper :steps="[['label'=&gt;'Un'],['label'=&gt;'Deux'],['label'=&gt;'Trois'],['label'=&gt;'Quatre']]" current="3" direction="vertical" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>steps</b> (array) : Liste des étapes [{label, icon}]</li>
                            <li><b>current</b> (int, défaut: 1) : Étape active</li>
                            <li><b>direction</b> (string, défaut: 'horizontal') : Direction (horizontal, vertical)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SLIDER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Slider</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="50" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="25" min="0" max="100" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="75" step="5" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="30" disabled />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="60" readonly />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="40" error="Message d'erreur" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="80" helpText="Texte d'aide" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="45" prefix="Min:" suffix="Max" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="90" color="danger" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="35" size="sm" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form.slider value="85" size="lg" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-slider value="50" /&gt;
&lt;x-slider value="25" min="0" max="100" /&gt;
&lt;x-slider value="75" step="5" /&gt;
&lt;x-slider value="30" disabled /&gt;
&lt;x-slider value="60" readonly /&gt;
&lt;x-slider value="40" error="Message d'erreur" /&gt;
&lt;x-slider value="80" helpText="Texte d'aide" /&gt;
&lt;x-slider value="45" prefix="Min:" suffix="Max" /&gt;
&lt;x-slider value="90" color="danger" /&gt;
&lt;x-slider value="35" size="sm" /&gt;
&lt;x-slider value="85" size="lg" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>value</b> (int, défaut: 0) : Valeur actuelle</li>
                            <li><b>min</b> (int, défaut: 0) : Valeur minimale</li>
                            <li><b>max</b> (int, défaut: 100) : Valeur maximale</li>
                            <li><b>step</b> (int, défaut: 1) : Pas</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le slider</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>prefix</b> (HTML, optionnel) : Élément avant le slider</li>
                            <li><b>suffix</b> (HTML, optionnel) : Élément après le slider</li>
                            <li><b>color</b> (string, optionnel) : Couleur (primary, secondary, danger, warning, success, info)</li>
                            <li><b>size</b> (string, défaut: 'md') : Taille (sm, md, lg)</li>
                            <li><b>showValue</b> (bool, défaut: true) : Affiche la valeur</li>
                            <li><b>showTooltip</b> (bool, défaut: true) : Affiche le tooltip</li>
                            <li><b>marks</b> (array, optionnel) : Marques sur le slider</li>
                            <li><b>range</b> (bool, défaut: false) : Mode plage</li>
                            <li><b>vertical</b> (bool, défaut: false) : Orientation verticale</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors du changement</li>
                            <li><b>onAfterChange</b> (function, optionnel) : Callback après le changement</li>
                            <li><b>name</b> (string, optionnel) : Nom du champ</li>
                            <li><b>id</b> (string, optionnel) : ID du champ</li>
                            <li><b>className</b> (string, optionnel) : Classes CSS personnalisées</li>
                            <li><b>style</b> (string, optionnel) : Styles CSS inline</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- TAG --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Tag</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag>Tag</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="primary">Primary</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="secondary">Secondary</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="danger">Danger</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="warning">Warning</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="success">Success</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag color="info">Info</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag size="sm">Petit</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag size="lg">Grand</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag closable>Fermable</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag icon="✓">Avec icône</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag bordered>Avec bordure</x-tag>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-tag checkable>Vérifiable</x-tag>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-tag&gt;Tag&lt;/x-tag&gt;
&lt;x-tag color="primary"&gt;Primary&lt;/x-tag&gt;
&lt;x-tag color="secondary"&gt;Secondary&lt;/x-tag&gt;
&lt;x-tag color="danger"&gt;Danger&lt;/x-tag&gt;
&lt;x-tag color="warning"&gt;Warning&lt;/x-tag&gt;
&lt;x-tag color="success"&gt;Success&lt;/x-tag&gt;
&lt;x-tag color="info"&gt;Info&lt;/x-tag&gt;
&lt;x-tag size="sm"&gt;Petit&lt;/x-tag&gt;
&lt;x-tag size="lg"&gt;Grand&lt;/x-tag&gt;
&lt;x-tag closable&gt;Fermable&lt;/x-tag&gt;
&lt;x-tag icon="✓"&gt;Avec icône&lt;/x-tag&gt;
&lt;x-tag bordered&gt;Avec bordure&lt;/x-tag&gt;
&lt;x-tag checkable&gt;Vérifiable&lt;/x-tag&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>color</b> (string, défaut: 'default') : Couleur (primary, secondary, danger, warning, success, info, default)</li>
                            <li><b>size</b> (string, défaut: 'md') : Taille (sm, md, lg)</li>
                            <li><b>closable</b> (bool, défaut: false) : Permet de fermer le tag</li>
                            <li><b>icon</b> (HTML, optionnel) : Icône SVG ou HTML</li>
                            <li><b>bordered</b> (bool, défaut: false) : Affiche une bordure</li>
                            <li><b>checkable</b> (bool, défaut: false) : Permet de cocher le tag</li>
                            <li><b>checked</b> (bool, défaut: false) : État coché</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le tag</li>
                            <li><b>rounded</b> (string, optionnel) : Coins arrondis (sm, md, lg, full)</li>
                            <li><b>onClose</b> (function, optionnel) : Callback lors de la fermeture</li>
                            <li><b>onCheck</b> (function, optionnel) : Callback lors du check</li>
                            <li><b>className</b> (string, optionnel) : Classes CSS personnalisées</li>
                            <li><b>style</b> (string, optionnel) : Styles CSS inline</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- TIMELINE --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Timeline</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-data.timeline><li>Début</li><li>Milieu</li><li>Fin</li></x-timeline>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-timeline&gt;&lt;li&gt;Début&lt;/li&gt;&lt;li&gt;Milieu&lt;/li&gt;&lt;li&gt;Fin&lt;/li&gt;&lt;/x-timeline&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>orientation</b> (string, optionnel) : Orientation (horizontal, vertical)</li>
                            <li><b>dot</b> (bool, optionnel) : Affiche un point pour chaque événement</li>
                            <li><b>color</b> (string, optionnel) : Couleur des points</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- STATISTIC --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Statistic</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-data.statistic value="42">Utilisateurs</x-statistic>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-statistic value="42"&gt;Utilisateurs&lt;/x-statistic&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>value</b> (int) : Valeur numérique</li>
                            <li><b>label</b> (string, optionnel) : Texte associé</li>
                            <li><b>color</b> (string, optionnel) : Couleur (primary, secondary, danger...)</li>
                            <li><b>icon</b> (HTML, optionnel) : Icône SVG ou HTML</li>
                            <li><b>prefix</b> (HTML, optionnel) : Élément avant la valeur</li>
                            <li><b>suffix</b> (HTML, optionnel) : Élément après la valeur</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- EMPTY --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Empty</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-feedback.empty>Aucune donnée</x-empty>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-empty&gt;Aucune donnée&lt;/x-empty&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>description</b> (string, optionnel) : Description du contenu vide</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- FORM --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Form</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form>
                            <x-form.formcontrol label="Nom">
                                <x-form.input />
                            </x-formcontrol>
                        </x-form>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-form&gt;<br>&lt;x-formcontrol label="Nom"&gt;<br>&lt;x-input /&gt;<br>&lt;/x-formcontrol&gt;<br>&lt;/x-form&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>method</b> (string, défaut: 'POST') : Méthode HTTP</li>
                            <li><b>action</b> (string, optionnel) : URL de soumission</li>
                            <li><b>enctype</b> (string, optionnel) : Type de contenu pour la soumission</li>
                            <li><b>onSubmit</b> (function, optionnel) : Callback lors de la soumission</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- DRAWER --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Drawer</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-layout.drawer><div>Contenu du drawer</div></x-drawer>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-drawer&gt;&lt;div&gt;Contenu du drawer&lt;/div&gt;&lt;/x-drawer&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>open</b> (bool, défaut: false) : Indique si le drawer est ouvert</li>
                            <li><b>placement</b> (string, défaut: 'right') : Position du drawer (left, right, top, bottom)</li>
                            <li><b>size</b> (string, optionnel) : Taille du drawer (sm, md, lg)</li>
                            <li><b>onClose</b> (function, optionnel) : Callback lors de la fermeture</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- UPLOAD --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Upload</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.upload />
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-upload /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>multiple</b> (bool, défaut: false) : Permet la sélection multiple</li>
                            <li><b>accept</b> (string, optionnel) : Types MIME acceptés</li>
                            <li><b>maxSize</b> (int, optionnel) : Taille maximale en octets</li>
                            <li><b>onUpload</b> (function, optionnel) : Callback lors du chargement</li>
                            <li><b>onError</b> (function, optionnel) : Callback en cas d'erreur</li>
                            <li><b>onComplete</b> (function, optionnel) : Callback lors de la complétion</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- IMAGE --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Image</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-media.image src="https://placehold.co/100x100" alt="Demo" />
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-image src="https://placehold.co/100x100" alt="Demo" /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>src</b> (string) : URL de l'image</li>
                            <li><b>alt</b> (string) : Texte alternatif</li>
                            <li><b>width</b> (int, optionnel) : Largeur</li>
                            <li><b>height</b> (int, optionnel) : Hauteur</li>
                            <li><b>fit</b> (string, optionnel) : Mode de redimensionnement (contain, cover, fill, none)</li>
                            <li><b>rounded</b> (string, optionnel) : Coins arrondis (sm, md, lg, full)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- AFFIX --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Affix</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-navigation.affix><x-button>Affixé</x-button></x-affix>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-affix&gt;&lt;x-button&gt;Affixé&lt;/x-button&gt;&lt;/x-affix&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>offset</b> (int, défaut: 0) : Décalage en pixels</li>
                            <li><b>position</b> (string, défaut: 'top') : Position (top, bottom)</li>
                            <li><b>onScroll</b> (function, optionnel) : Callback lors du défilement</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ANCHOR --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Anchor</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-navigation.anchor href="#">Lien ancre</x-anchor>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-anchor href="#"&gt;Lien ancre&lt;/x-anchor&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>href</b> (string) : URL de l'ancre</li>
                            <li><b>target</b> (string, optionnel) : Cible (_blank, _self, _parent, _top)</li>
                            <li><b>rel</b> (string, optionnel) : Type de lien (noopener, noreferrer)</li>
                            <li><b>icon</b> (HTML, optionnel) : Icône SVG ou HTML</li>
                            <li><b>iconPosition</b> (string, optionnel) : Position de l'icône (left, right)</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- DESCRIPTIONS --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Descriptions</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-data.descriptions>
                            <div>
                                <dt>Nom</dt>
                                <dd>John Doe</dd>
                            </div>
                        </x-descriptions>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-descriptions&gt;<br>&lt;div&gt;<br>&lt;dt&gt;Nom&lt;/dt&gt;<br>&lt;dd&gt;John Doe&lt;/dd&gt;<br>&lt;/div&gt;<br>&lt;/x-descriptions&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>bordered</b> (bool, défaut: false) : Affiche une bordure</li>
                            <li><b>column</b> (int, optionnel) : Nombre de colonnes</li>
                            <li><b>labelStyle</b> (string, optionnel) : Style du label</li>
                            <li><b>valueStyle</b> (string, optionnel) : Style de la valeur</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- MENTIONS --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Mentions</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.mentions>@john</x-mentions>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-mentions&gt;@john&lt;/x-mentions&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>value</b> (string, optionnel) : Texte initial</li>
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur max</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur min</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors du changement</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- FORMCONTROL --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">FormControl</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.formcontrol label="Bio">
                            <x-form.texteditor rows="2">Votre bio...</x-texteditor>
                        </x-formcontrol>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-formcontrol label="Bio"&gt;<br>&lt;x-texteditor rows="2"&gt;Votre bio...&lt;/x-texteditor&gt;<br>&lt;/x-formcontrol&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>label</b> (string, optionnel) : Libellé affiché au-dessus</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- TEXTAREA --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">TextEditor</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.texteditor rows="2">Votre bio...</x-texteditor>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-texteditor rows="2"&gt;Votre bio...&lt;/x-texteditor&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>rows</b> (int, défaut: 3) : Nombre de lignes</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SIDEBAR --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Sidebar</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-navigation.sidebar><ul><li class="p-2">Menu 1</li></ul></x-sidebar>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-sidebar&gt;&lt;ul&gt;&lt;li class="p-2"&gt;Menu 1&lt;/li&gt;&lt;/ul&gt;&lt;/x-sidebar&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>open</b> (bool, défaut: false) : Indique si la sidebar est ouverte</li>
                            <li><b>placement</b> (string, défaut: 'left') : Position de la sidebar (left, right, top, bottom)</li>
                            <li><b>size</b> (string, optionnel) : Taille de la sidebar (sm, md, lg)</li>
                            <li><b>onClose</b> (function, optionnel) : Callback lors de la fermeture</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- AUTOCOMPLETE --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Autocomplete</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.autocomplete placeholder="Chercher..." />
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-autocomplete placeholder="Chercher..." /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur max</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur min</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors du changement</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- CHARTS --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Charts</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-charts>Graphique ici</x-charts>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-charts&gt;Graphique ici&lt;/x-charts&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>type</b> (string, optionnel) : Type de graphique (bar, line, pie, donut, radar, polar, scatter, bubble, heatmap, treemap, funnel, waterfall, candlestick, boxplot, violin, density, histogram, pie-doughnut, radar-polar, scatter-bubble, heatmap-treemap, funnel-waterfall, candlestick-boxplot, violin-density, histogram-pie-doughnut, radar-polar-scatter-bubble, heatmap-treemap-funnel-waterfall, candlestick-boxplot-violin-density, histogram-pie-doughnut-radar-polar-scatter-bubble, heatmap-treemap-funnel-waterfall-candlestick-boxplot-violin-density)</li>
                            <li><b>options</b> (object, optionnel) : Options de configuration du graphique</li>
                    </ul>
                    </div>
                </div>
            </div>
            {{-- CALENDAR --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Calendar</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-calendar>Calendrier ici</x-calendar>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-calendar&gt;Calendrier ici&lt;/x-calendar&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>modelValue</b> (string, optionnel) : Date sélectionnée</li>
                            <li><b>range</b> (bool, défaut: false) : Permet la sélection de plages</li>
                            <li><b>disabledDates</b> (array, optionnel) : Dates désactivées</li>
                            <li><b>highlightedDates</b> (array, optionnel) : Dates mises en évidence</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors de la sélection</li>
                    </ul>
                    </div>
                </div>
            </div>
            {{-- COMBOBOX --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Combobox</h3>
                    <div class="py-8 px-6 bg-gray-50 rounded flex items-center justify-center min-h-[120px] max-w-full overflow-x-auto" style="min-width:0;">
                        <x-form.combobox placeholder="Choisir..." />
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-combobox placeholder="Choisir..." /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>placeholder</b> (string, optionnel) : Texte d'exemple</li>
                            <li><b>disabled</b> (bool, défaut: false) : Désactive le champ</li>
                            <li><b>readonly</b> (bool, défaut: false) : Lecture seule</li>
                            <li><b>error</b> (string|bool, optionnel) : Message ou état d'erreur</li>
                            <li><b>helpText</b> (string, optionnel) : Texte d'aide</li>
                            <li><b>maxlength</b> (int, optionnel) : Longueur max</li>
                            <li><b>minlength</b> (int, optionnel) : Longueur min</li>
                            <li><b>onChange</b> (function, optionnel) : Callback lors du changement</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- CARD --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Card</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.card>
                                <div class="p-4">Carte simple</div>
                            </x-card>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-layout.card>
                                <div class="p-4">
                                    <h4 class="font-bold mb-2">Titre de la carte</h4>
                                    <p>Contenu de la carte avec un bouton :</p>
                                    <x-button class="mt-2">Action</x-button>
                                </div>
                            </x-card>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-card&gt;
    &lt;div class=&quot;p-4&quot;&gt;Carte simple&lt;/div&gt;
&lt;/x-card&gt;
&lt;x-card&gt;
    &lt;div class=&quot;p-4&quot;&gt;
        &lt;h4 class=&quot;font-bold mb-2&quot;&gt;Titre de la carte&lt;/h4&gt;
        &lt;p&gt;Contenu de la carte avec un bouton :&lt;/p&gt;
        &lt;x-button class=&quot;mt-2&quot;&gt;Action&lt;/x-button&gt;
    &lt;/div&gt;
&lt;/x-card&gt;</code></pre>
                    </div>
                </div>
            </div>
            {{-- TIMELINE (exemples exhaustifs) --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Timeline (toutes variantes)</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.timeline :items="[['label'=>'Début','content'=>'Création','color'=>'bg-blue-200'],['label'=>'Milieu','content'=>'En cours','color'=>'bg-yellow-200'],['label'=>'Fin','content'=>'Terminé','color'=>'bg-green-200']]" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.timeline :items="[['label'=>'A','content'=>'Étape A'],['label'=>'B','content'=>'Étape B','icon'=>'<svg class=\'w-3 h-3\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><circle cx=\'10\' cy=\'10\' r=\'10\' /></svg>'],['label'=>'C','content'=>'Étape C']]" mode="alternate" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.timeline :items="[['label'=>'1'],['label'=>'2'],['label'=>'3']]" pending reverse />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-data.timeline :items="[['label'=&gt;'Début','content'=&gt;'Création','color'=&gt;'bg-blue-200'],['label'=&gt;'Milieu','content'=&gt;'En cours','color'=&gt;'bg-yellow-200'],['label'=&gt;'Fin','content'=&gt;'Terminé','color'=&gt;'bg-green-200']]" /&gt;
&lt;x-data.timeline :items="[['label'=&gt;'A','content'=&gt;'Étape A'],['label'=&gt;'B','content'=&gt;'Étape B','icon'=&gt;'<svg class=\'w-3 h-3\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><circle cx=\'10\' cy=\'10\' r=\'10\' /></svg>'],['label'=&gt;'C','content'=&gt;'Étape C']]" mode="alternate" /&gt;
&lt;x-data.timeline :items="[['label'=&gt;'1'],['label'=&gt;'2'],['label'=&gt;'3']]" pending reverse /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>items</b> (array) : Liste des événements [{label, content, icon, color}]</li>
                            <li><b>mode</b> (string, défaut: 'left') : Mode (left, right, alternate)</li>
                            <li><b>pending</b> (bool, défaut: false) : Affiche "En attente"</li>
                            <li><b>reverse</b> (bool, défaut: false) : Inverse l'ordre</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- STATISTIC (exemples exhaustifs) --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Statistic (toutes variantes)</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.statistic title="Utilisateurs" value="1234" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.statistic title="CA" value="45678.90" prefix="€" precision="2" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.statistic title="Taux" value="98.7" suffix="%" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-data.statistic title="Chargement" loading />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-data.statistic title="Utilisateurs" value="1234" /&gt;
&lt;x-data.statistic title="CA" value="45678.90" prefix="€" precision="2" /&gt;
&lt;x-data.statistic title="Taux" value="98.7" suffix="%" /&gt;
&lt;x-data.statistic title="Chargement" loading /&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>title</b> (string, optionnel) : Titre</li>
                            <li><b>value</b> (string|int|float) : Valeur</li>
                            <li><b>prefix</b> (string, optionnel) : Préfixe</li>
                            <li><b>suffix</b> (string, optionnel) : Suffixe</li>
                            <li><b>precision</b> (int, défaut: 0) : Précision décimale</li>
                            <li><b>loading</b> (bool, défaut: false) : Affiche un spinner</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- EMPTY (exemples exhaustifs) --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Empty (toutes variantes)</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.empty description="Aucune donnée disponible" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.empty image="https://placehold.co/48x48" description="Aucun résultat" />
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-feedback.empty>Aucun élément trouvé</x-feedback.empty>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-feedback.empty description="Aucune donnée disponible" /&gt;
&lt;x-feedback.empty image="https://placehold.co/48x48" description="Aucun résultat" /&gt;
&lt;x-feedback.empty&gt;Aucun élément trouvé&lt;/x-feedback.empty&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>description</b> (string, optionnel) : Description</li>
                            <li><b>image</b> (string, optionnel) : URL de l'image</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- FORM (exemples exhaustifs) --}}
            <div class="bg-white rounded-lg shadow border border-gray-100 p-6 flex flex-col md:flex-row md:items-start md:gap-8 transition hover:shadow-md">
                <div class="flex-1 mb-4 md:mb-0">
                    <h3 class="font-semibold text-lg mb-3 text-gray-800">Form (toutes variantes)</h3>
                    <div class="space-y-4">
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form layout="vertical">
                                <x-form.formcontrol label="Nom"><x-form.input /></x-form.formcontrol>
                                <x-form.formcontrol label="Email"><x-form.input type="email" /></x-form.formcontrol>
                            </x-form>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form layout="horizontal" columns="2">
                                <x-form.formcontrol label="Adresse"><x-form.input /></x-form.formcontrol>
                                <x-form.formcontrol label="Ville"><x-form.input /></x-form.formcontrol>
                            </x-form>
                        </div>
                        <div class="py-2 px-2 bg-gray-50 rounded flex items-center justify-center min-h-[48px]">
                            <x-form layout="inline">
                                <x-form.formcontrol label="Recherche"><x-form.input /></x-form.formcontrol>
                                <x-form.formcontrol><x-button>Rechercher</x-button></x-form.formcontrol>
                            </x-form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 flex flex-col gap-2">
                    <div class="bg-gray-900 text-gray-100 rounded p-4 text-xs font-mono overflow-x-auto mb-2">
                        <pre class="whitespace-pre-wrap break-words"><code>&lt;x-form layout="vertical"&gt;
    &lt;x-form.formcontrol label="Nom"&gt;&lt;x-form.input /&gt;&lt;/x-form.formcontrol&gt;
    &lt;x-form.formcontrol label="Email"&gt;&lt;x-form.input type="email" /&gt;&lt;/x-form.formcontrol&gt;
&lt;/x-form&gt;
&lt;x-form layout="horizontal" columns="2"&gt;
    &lt;x-form.formcontrol label="Adresse"&gt;&lt;x-form.input /&gt;&lt;/x-form.formcontrol&gt;
    &lt;x-form.formcontrol label="Ville"&gt;&lt;x-form.input /&gt;&lt;/x-form.formcontrol&gt;
&lt;/x-form&gt;
&lt;x-form layout="inline"&gt;
    &lt;x-form.formcontrol label="Recherche"&gt;&lt;x-form.input /&gt;&lt;/x-form.formcontrol&gt;
    &lt;x-form.formcontrol&gt;&lt;x-button&gt;Rechercher&lt;/x-button&gt;&lt;/x-form.formcontrol&gt;
&lt;/x-form&gt;</code></pre>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-xs">
                        <div class="font-semibold mb-1">Paramètres :</div>
                        <ul class="list-disc pl-4">
                            <li><b>layout</b> (string, défaut: 'vertical') : vertical, horizontal, inline</li>
                            <li><b>columns</b> (int, optionnel) : Nombre de colonnes (horizontal)</li>
                            <li><b>onSubmit</b> (function, optionnel) : Callback submit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="install" class="mb-16">
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Installation</h2>
        <x-layout.card>
            <ol class="list-decimal pl-6 space-y-2 text-sm">
                <li>Installer le projet (exemple) :<br>
                    <code class="bg-gray-100 px-2 py-1 rounded">git clone https://github.com/martin-lechene/larappeui.git</code>
                </li>
                <li>Publier les composants Blade :<br>
                    <code class="bg-gray-100 px-2 py-1 rounded">php artisan vendor:publish --tag=larappeui-components</code> 
                </li>
                <li>Configurer TailwindCSS :<br>
                    <code class="bg-gray-100 px-2 py-1 rounded">@import 'tailwindcss/forms';<br>@import 'tailwindcss/typography';<br>@import 'tailwindcss/aspect-ratio';</code>
                </li>
                <li>Utiliser les composants dans vos vues Blade :<br>
                    <code class="bg-gray-100 px-2 py-1 rounded">&lt;x-button&gt;Valider&lt;/x-button&gt;</code>
                </li>
            </ol>
        </x-card>
    </section>
@endsection

@section('scripts')
<script type="module" src="/resources/js/theme-switcher.js"></script>
<script>
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const codeId = btn.getAttribute('data-clipboard-target');
            const codeBlock = document.querySelector(codeId);
            if (codeBlock) {
                const text = codeBlock.innerText;
                navigator.clipboard.writeText(text).then(() => {
                    btn.textContent = 'Copié !';
                    setTimeout(() => btn.textContent = 'Copier', 1200);
                });
            }
        });
    });
</script>
@endsection
