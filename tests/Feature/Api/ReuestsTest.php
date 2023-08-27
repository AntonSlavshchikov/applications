<?php

namespace Feature\Api;

use App\Models\Enums\Request\StatusEnum;
use App\Models\Request;
use Tests\TestCase;

class ReuestsTest extends TestCase
{
    public function test_create_request(): void
    {
        $response = $this->post($this->host . '/requests', [
            'name' => 'Test Test Test',
            'email' => 'test@test.com',
            'message' => 'Test message. Ok!',
        ]);

        $response->assertStatus(200);
    }

    public function test_get_all_requests(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->get($this->host . '/requests');

        $response->assertStatus(200);
    }

    public function test_update_request(): void
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->put($this->host . '/requests/1', [
                'status' => StatusEnum::resolved->value,
                'comment' => 'Test comment. Ok!',
            ]);
        $response->assertStatus(200);
    }
}
