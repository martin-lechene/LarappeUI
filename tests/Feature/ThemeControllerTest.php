<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ThemeControllerTest extends TestCase
{
    public function test_get_theme_returns_default_light(): void
    {
        $response = $this->getJson('/theme/get');

        $response->assertOk();
        $response->assertJson(['theme' => 'light']);
    }

    public function test_set_theme_saves_to_session(): void
    {
        $response = $this->postJson('/theme/set', ['theme' => 'dark']);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'theme' => 'dark',
        ]);

        $this->assertEquals('dark', Session::get('theme'));
    }

    public function test_set_theme_defaults_to_light_for_invalid(): void
    {
        $response = $this->postJson('/theme/set', ['theme' => 'nonexistent-theme']);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'theme' => 'light',
        ]);
    }

    public function test_set_theme_returns_valid_themes_list(): void
    {
        $response = $this->postJson('/theme/set', ['theme' => 'light']);

        $response->assertOk();
        $response->assertJsonStructure([
            'validThemes',
        ]);
        $this->assertIsArray($response->json('validThemes'));
        $this->assertNotEmpty($response->json('validThemes'));
    }

    public function test_set_theme_without_payload_defaults_to_light(): void
    {
        $response = $this->postJson('/theme/set', []);

        $response->assertOk();
        $response->assertJson(['theme' => 'light']);
    }

    /**
     * Chaque palette du catalogue doit etre acceptee telle quelle.
     *
     * L'ancienne validation extrayait la liste par expression reguliere depuis
     * public/css/themes.css et ratait les selecteurs groupes : six themes
     * valides retombaient silencieusement sur « light ».
     */
    public function test_every_catalogued_theme_is_accepted(): void
    {
        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes');

        foreach (array_keys($palettes) as $theme) {
            $response = $this->postJson('/theme/set', ['theme' => $theme]);

            $response->assertOk();
            $response->assertJson(['theme' => $theme], "Le theme « {$theme} » a ete refuse.");
        }
    }

    public function test_aliases_resolve_to_their_base_palette(): void
    {
        /** @var array<string, string> $aliases */
        $aliases = config('themes.aliases');

        $this->assertNotEmpty($aliases, 'Le catalogue ne declare aucun alias.');

        foreach ($aliases as $alias => $base) {
            $response = $this->postJson('/theme/set', ['theme' => $alias]);

            $response->assertOk();
            $response->assertJson(['theme' => $base], "L'alias « {$alias} » n'a pas resolu vers « {$base} ».");
        }
    }

    public function test_unknown_themes_never_reach_the_session(): void
    {
        foreach (['nimportequoi', '../../etc/passwd', '<script>', 'theme-light'] as $invalid) {
            $response = $this->postJson('/theme/set', ['theme' => $invalid]);

            $response->assertOk();
            $response->assertJson(['theme' => 'light']);
        }
    }
}
