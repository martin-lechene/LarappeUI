<?php

namespace Tests\Unit;

use App\Http\Controllers\ThemeController;
use App\Http\Middleware\SecurityHeaders;
use App\Http\Middleware\ThemeMiddleware;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Verifie que l'autoloading et la configuration PHPUnit sont operationnels.
     * Remplace un `assertTrue(true)` qui ne testait rien.
     */
    public function test_application_classes_are_autoloadable(): void
    {
        $this->assertTrue(class_exists(ThemeController::class));
        $this->assertTrue(class_exists(ThemeMiddleware::class));
        $this->assertTrue(class_exists(SecurityHeaders::class));
    }
}
