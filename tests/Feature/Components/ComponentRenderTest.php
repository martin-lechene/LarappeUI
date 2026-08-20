<?php

namespace Tests\Feature\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

/**
 * Rendu de chaque composant Blade avec ses valeurs par défaut : ce test échoue
 * si un composant déclare mal ses `@props` ou casse à l'affichage.
 */
class ComponentRenderTest extends TestCase
{
    /**
     * Composants attendant un contexte particulier (slots nommés, données).
     *
     * @var array<string, string>
     */
    private const SLOTS = [
        'split-pane' => '<x-slot name="left">G</x-slot><x-slot name="right">D</x-slot>',
    ];

    /**
     * Composants dont le rendu par défaut est vide par conception (masqués tant
     * qu'ils ne sont pas ouverts).
     *
     * @var array<string, string>
     */
    private const EXTRA_PROPS = [
        'drawer' => ' :open="true"',
    ];

    /**
     * @return array<string, array{string}>
     */
    public static function componentProvider(): array
    {
        // Le provider est appelé avant le boot de l'application : pas de helper
        // `resource_path()` disponible ici.
        $base = dirname(__DIR__, 3).'/resources/views/components';
        $components = [];

        foreach (glob("{$base}/*/*.blade.php") as $path) {
            $directory = basename(dirname($path));
            $name = basename($path, '.blade.php');
            $components["{$directory}.{$name}"] = ["{$directory}.{$name}"];
        }

        foreach (glob("{$base}/*.blade.php") as $path) {
            $name = basename($path, '.blade.php');
            $components[$name] = [$name];
        }

        return $components;
    }

    #[DataProvider('componentProvider')]
    public function test_component_renders_with_default_props(string $component): void
    {
        $short = Str::afterLast($component, '.');
        $slot = self::SLOTS[$short] ?? 'Contenu';
        $props = self::EXTRA_PROPS[$short] ?? '';

        $html = Blade::render("<x-{$component}{$props}>{$slot}</x-{$component}>");

        $this->assertNotSame('', trim($html), "Le composant {$component} ne rend rien");
    }

    public function test_form_component_injects_a_csrf_token(): void
    {
        $html = Blade::render('<x-form.form>Champs</x-form.form>');

        $this->assertStringContainsString('name="_token"', $html);
        $this->assertStringContainsString('method="post"', $html);
    }

    public function test_form_component_omits_csrf_for_get_forms(): void
    {
        $html = Blade::render('<x-form.form method="GET">Champs</x-form.form>');

        $this->assertStringNotContainsString('name="_token"', $html);
        $this->assertStringContainsString('method="get"', $html);
    }

    public function test_form_component_spoofs_non_browser_methods(): void
    {
        $html = Blade::render('<x-form.form method="PUT">Champs</x-form.form>');

        $this->assertStringContainsString('name="_method"', $html);
        $this->assertStringContainsString('value="PUT"', $html);
        $this->assertStringContainsString('method="post"', $html);
    }

    public function test_disabled_form_uses_a_fieldset_instead_of_an_invalid_attribute(): void
    {
        $html = Blade::render('<x-form.form :disabled="true">Champs</x-form.form>');

        $this->assertStringContainsString('<fieldset disabled', $html);
        $this->assertDoesNotMatchRegularExpression('/<form[^>]*\sdisabled/', $html);
    }

    public function test_gallery_images_expose_an_alt_attribute(): void
    {
        $html = Blade::render('<x-extra.gallery />');

        preg_match_all('/<img[^>]*>/', $html, $images);

        $this->assertNotEmpty($images[0]);
        foreach ($images[0] as $image) {
            $this->assertMatchesRegularExpression('/(alt=|:alt=)/', $image, "Image sans alt : {$image}");
        }
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function accessibilityProvider(): array
    {
        return [
            'menu contextuel' => ['<x-extra.context-menu>Zone</x-extra.context-menu>', 'role="menu"'],
            'items de menu' => ['<x-extra.context-menu>Zone</x-extra.context-menu>', 'role="menuitem"'],
            'pagination compacte' => ['<x-extra.pagination-compact />', 'aria-label="Page précédente"'],
            'select de préfixe téléphonique' => ['<x-extra.phone-input />', 'aria-label="Indicatif téléphonique"'],
            'champs OTP' => ['<x-extra.otp-input />', 'Chiffre ${i + 1}'],
            'palette de commandes' => ['<x-extra.command-palette />', 'aria-label="Rechercher une commande"'],
            'alerte fermable' => ['<x-extra.alert>Message</x-extra.alert>', 'aria-label="Fermer"'],
            'dialogue de confirmation' => ['<x-extra.confirm-dialog>Sûr ?</x-extra.confirm-dialog>', 'aria-modal="true"'],
            'onglets verticaux' => ['<x-extra.vertical-tabs>Contenu</x-extra.vertical-tabs>', 'role="tab"'],
            'onglets segmentés' => ['<x-extra.segmented-tabs />', 'role="tablist"'],
            'options du combobox' => ['<x-extra.combobox-virtual />', 'role="option"'],
            'options du select distant' => ['<x-extra.select-async />', 'role="listbox"'],
            'snackbar' => ['<x-extra.snackbar />', 'role="status"'],
            'dropzone' => ['<x-extra.dropzone />', 'aria-label="Fichiers à téléverser"'],
            'mega menu' => ['<x-extra.mega-menu />', 'aria-label="Produits"'],
            // L'apostrophe du libellé est échappée par Blade.
            'fil d’Ariane' => ['<x-extra.breadcrumbs-overflow />', 'aria-label="Fil d&#039;Ariane"'],
            'sommaire' => ['<x-extra.table-of-contents />', 'aria-labelledby='],
            'tableau simple' => ['<x-extra.data-table />', '<caption'],
            'tableau pro' => ['<x-extra.data-table-pro />', '<caption'],
            'pagination du tableau' => ['<x-extra.data-table />', 'aria-label="Page suivante"'],
            'séparateur redimensionnable' => ['<x-extra.split-pane />', 'role="separator"'],
        ];
    }

    #[DataProvider('accessibilityProvider')]
    public function test_component_exposes_accessibility_attributes(string $template, string $expected): void
    {
        $this->assertStringContainsString($expected, Blade::render($template));
    }
}
