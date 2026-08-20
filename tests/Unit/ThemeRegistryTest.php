<?php

namespace Tests\Unit;

use App\Support\ThemeRegistry;
use Tests\TestCase;

class ThemeRegistryTest extends TestCase
{
    public function test_available_returns_the_configured_themes(): void
    {
        config(['themes.available' => ['light', 'dark']]);

        $this->assertSame(['light', 'dark'], ThemeRegistry::available());
    }

    public function test_available_falls_back_when_configuration_is_empty(): void
    {
        config(['themes.available' => []]);

        $this->assertSame([ThemeRegistry::DEFAULT_THEME], ThemeRegistry::available());
    }

    public function test_default_reads_the_configuration(): void
    {
        config(['themes.default' => 'pro']);

        $this->assertSame('pro', ThemeRegistry::default());
    }

    public function test_sanitize_keeps_a_known_theme(): void
    {
        $this->assertSame('dark', ThemeRegistry::sanitize('dark'));
    }

    public function test_sanitize_rejects_unknown_and_null_values(): void
    {
        config(['themes.default' => 'light']);

        $this->assertSame('light', ThemeRegistry::sanitize('does-not-exist'));
        $this->assertSame('light', ThemeRegistry::sanitize(null));
        $this->assertSame('light', ThemeRegistry::sanitize(''));
    }
}
