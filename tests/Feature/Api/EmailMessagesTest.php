<?php

namespace Tests\Feature\Api;

use App\Models\Enums\Request\StatusEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailMessagesTest extends TestCase
{
    public function test_send(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->post($this->host . '/emails/send', [
                'email' => 'test@test.com',
                'message' => 'Test message. Ok!',
            ]);

        $response->assertStatus(200);
    }

    public function test_get_all_requests(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->get($this->host . '/emails');

        $response->assertStatus(200);
    }
}
