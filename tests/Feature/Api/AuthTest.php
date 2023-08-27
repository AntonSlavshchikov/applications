<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register(): void
    {
        $response = $this->post($this->host . '/auth/register', [
                'name' => 'Test Test Test 2',
                'email' => 'test2@test.com',
                'password' => '11111111111',
                'password_confirmation' => '11111111111',
            ]);

        $response->assertStatus(200);
    }

    public function test_login(): void
    {
        $response = $this->post($this->host . '/auth/login', [
                'email' => 'test2@test.com',
                'password' => '11111111111',
            ]);

        $response->assertStatus(200);
    }

    public function test_me(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->get($this->host . '/auth/me');

        $response->assertStatus(200);
    }

    public function test_logout(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->post($this->host . '/auth/logout');

        $response->assertStatus(204);
    }
}
