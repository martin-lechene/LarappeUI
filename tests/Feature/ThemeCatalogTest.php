<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Verifie qu'aucune source ne rederive la liste des themes.
 *
 * Le projet a longtemps porte quatre catalogues divergents : resources/css,
 * resources/js, public/css et public/js declaraient respectivement 25, 25, 40 et
 * 31 themes. Le serveur en acceptait 34, dont 9 sans definition cote client, et
 * l'interface n'en proposait que 3.
 */
class ThemeCatalogTest extends TestCase
{
    public function test_config_declares_a_complete_catalog(): void
    {
        $palettes = config('themes.palettes');
        $selectable = config('themes.selectable');
        $aliases = config('themes.aliases');
        $darkOf = config('themes.dark_of');

        $this->assertIsArray($palettes);
        $this->assertIsArray($selectable);
        $this->assertIsArray($aliases);
        $this->assertIsArray($darkOf);

        $this->assertNotEmpty($palettes);
        $this->assertArrayHasKey(config('themes.default'), $palettes);
    }

    public function test_every_palette_declares_every_colour_role(): void
    {
        $roles = [
            'primary', 'secondary', 'success', 'warning', 'danger', 'info',
            'background', 'surface', 'text', 'textSecondary', 'border', 'accent',
        ];

        /** @var array<string, array<string, string>> $palettes */
        $palettes = config('themes.palettes');

        foreach ($palettes as $name => $palette) {
            foreach ($roles as $role) {
                $this->assertArrayHasKey($role, $palette, "Le theme « {$name} » ne declare pas « {$role} ».");
                $this->assertNotSame('', $palette[$role], "Le theme « {$name} » laisse « {$role} » vide.");
            }
        }
    }

    public function test_css_declares_exactly_the_same_themes_as_the_config(): void
    {
        $css = file_get_contents(resource_path('css/themes.css'));
        $this->assertIsString($css);

        preg_match_all('/^\.theme-([a-zA-Z0-9_-]+)\s*\{/m', $css, $matches);

        $inCss = array_unique($matches[1]);
        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes');
        $inConfig = array_keys($palettes);

        sort($inCss);
        sort($inConfig);

        $this->assertSame(
            $inConfig,
            $inCss,
            'resources/css/themes.css et config/themes.php ont divergé : regenerer le CSS depuis la config.'
        );
    }

    public function test_aliases_and_dark_variants_point_at_real_palettes(): void
    {
        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes');
        /** @var array<string, string> $aliases */
        $aliases = config('themes.aliases');
        /** @var array<string, string> $darkOf */
        $darkOf = config('themes.dark_of');

        foreach ($aliases as $alias => $target) {
            $this->assertArrayHasKey($target, $palettes, "L'alias « {$alias} » pointe sur « {$target} », qui n'existe pas.");
            $this->assertArrayNotHasKey($alias, $palettes, "« {$alias} » est a la fois un alias et une palette.");
        }

        foreach ($darkOf as $base => $dark) {
            $this->assertArrayHasKey($base, $palettes, "La base « {$base} » n'existe pas.");
            $this->assertArrayHasKey($dark, $palettes, "La variante sombre « {$dark} » n'existe pas.");
        }
    }

    public function test_selectable_themes_exclude_dark_variants(): void
    {
        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes');
        /** @var list<string> $selectable */
        $selectable = config('themes.selectable');
        /** @var array<string, string> $darkOf */
        $darkOf = config('themes.dark_of');

        $darkVariants = array_values($darkOf);

        foreach ($selectable as $theme) {
            $this->assertArrayHasKey($theme, $palettes, "Le theme selectionnable « {$theme} » n'a pas de palette.");
            $this->assertNotContains(
                $theme,
                $darkVariants,
                "« {$theme} » est une variante sombre : elle s'atteint par l'interrupteur, pas par le selecteur."
            );
        }
    }
}
