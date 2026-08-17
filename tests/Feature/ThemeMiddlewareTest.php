<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ThemeMiddlewareTest extends TestCase
{
    public function test_middleware_sets_default_theme_in_session(): void
    {
        Session::forget('theme');

        $response = $this->get(route('components'));

        $response->assertOk();
        $this->assertEquals('light', Session::get('theme'));
    }

    public function test_middleware_preserves_existing_theme(): void
    {
        Session::put('theme', 'dark');

        $response = $this->get(route('components'));

        $response->assertOk();
        $this->assertEquals('dark', Session::get('theme'));
    }

    public function test_middleware_shares_current_theme_with_views(): void
    {
        Session::put('theme', 'pro');

        $response = $this->get(route('components'));

        $response->assertOk();
        $response->assertSee('theme-pro');
    }
}
