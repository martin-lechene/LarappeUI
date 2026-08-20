<?php

namespace Tests\Feature;

use App\Support\ThemeRegistry;
use Tests\TestCase;

/**
 * Garde-fou contre la désynchronisation des trois déclarations de thèmes :
 * la configuration PHP, les palettes JS et le CSS généré.
 */
class ThemeConsistencyTest extends TestCase
{
    /**
     * @return list<string>
     */
    private function jsThemeNames(): array
    {
        $source = file_get_contents(base_path('resources/js/themes.js'));

        // Les clés de premier niveau de l'objet `themes` (indentation à 2 espaces).
        preg_match('/export const themes = \{(.*?)\n\};/s', $source, $block);
        $this->assertNotEmpty($block, 'Objet `themes` introuvable dans resources/js/themes.js');

        preg_match_all("/^  '?([a-zA-Z0-9_-]+)'?: \{/m", $block[1], $matches);

        return $matches[1];
    }

    /**
     * @return list<string>
     */
    private function cssThemeNames(): array
    {
        $css = file_get_contents(base_path('resources/css/themes.css'));
        preg_match_all('/^\.theme-([a-zA-Z0-9_-]+),/m', $css, $matches);

        return $matches[1];
    }

    public function test_php_and_js_declare_the_same_themes(): void
    {
        $php = ThemeRegistry::available();
        $js = $this->jsThemeNames();

        sort($php);
        sort($js);

        $this->assertSame($php, $js, 'config/themes.php et resources/js/themes.js divergent');
    }

    public function test_generated_css_covers_every_theme(): void
    {
        $expected = ThemeRegistry::available();
        $css = $this->cssThemeNames();

        sort($expected);
        sort($css);

        $this->assertSame(
            $expected,
            $css,
            'resources/css/themes.css est désynchronisé — lancez `npm run themes:build`'
        );
    }

    public function test_generated_css_exposes_semantic_aliases(): void
    {
        $css = file_get_contents(base_path('resources/css/themes.css'));

        // Variables consommées par resources/css/app.css : leur absence ferait
        // silencieusement disparaître les styles au runtime.
        foreach (['--background', '--text', '--surface', '--primary', '--accent', '--tooltip-bg'] as $variable) {
            $this->assertStringContainsString(
                "{$variable}:",
                $css,
                "La variable {$variable} n'est plus générée"
            );
        }
    }

    public function test_every_theme_is_also_exposed_on_the_root_attribute(): void
    {
        $css = file_get_contents(base_path('resources/css/themes.css'));

        foreach (ThemeRegistry::available() as $theme) {
            $this->assertStringContainsString(
                "[theme='{$theme}']",
                $css,
                "Le thème {$theme} n'est pas applicable sur <html>"
            );
        }
    }

    public function test_semantic_color_utilities_stay_declared_to_tailwind(): void
    {
        $css = file_get_contents(base_path('resources/css/app.css'));

        $this->assertStringContainsString('@theme', $css, 'Le bloc @theme a disparu de app.css');

        // Sans ces déclarations, Tailwind ne génère plus `text-primary`,
        // `border-primary`, `bg-surface`… pourtant utilisées par les vues.
        foreach (['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'surface', 'border'] as $color) {
            $this->assertMatchesRegularExpression(
                "/--color-{$color}:/",
                $css,
                "La couleur {$color} n'est plus exposée à Tailwind"
            );
        }
    }

    public function test_default_theme_is_available(): void
    {
        $this->assertContains(ThemeRegistry::default(), ThemeRegistry::available());
    }
}
