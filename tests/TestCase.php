<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $host;

    public $user;
    public string $token = '';
    protected static $isSetup = false;

    protected function setUp(): void
    {
        parent::setUp();

        if(!static::$isSetup) {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');

            static::$isSetup = true;
        }

        $this->host = config('app.url') . '/api';
        $this->user = User::find(1);
        $this->token = $this->user
            ->createToken('auth')
            ->plainTextToken;
    }

    public function tearDown() : void
    {
        parent::tearDown();
    }
}
