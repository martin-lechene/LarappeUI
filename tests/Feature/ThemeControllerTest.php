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
}
