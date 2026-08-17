<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_contact_form_returns_success_with_valid_data(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'message' => 'Bonjour, ceci est un test.',
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'message' => 'Merci, votre message a bien été envoyé.',
        ]);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->postJson('/contact', []);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    public function test_contact_form_validates_email_format(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'Jean',
            'email' => 'not-an-email',
            'message' => 'Test',
        ]);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['email']);
    }

    public function test_contact_form_validates_max_length(): void
    {
        $response = $this->postJson('/contact', [
            'name' => str_repeat('a', 101),
            'email' => 'jean@example.com',
            'message' => 'Test',
        ]);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_contact_form_validates_message_max_length(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'Jean',
            'email' => 'jean@example.com',
            'message' => str_repeat('a', 2001),
        ]);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['message']);
    }
}
