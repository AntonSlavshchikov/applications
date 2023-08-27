<?php

namespace App\Actions\Api\Auth;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginAction
{
    public function __invoke(LoginRequest $request): Response
    {
        try {
            $user = User::query()
                ->where('email', $request->email)
                ->first();

            Auth::login($user);

            $token = $user->createToken('auth')->plainTextToken;

            return response([
                'token' => $token
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response([
                'errors' => [
                    'message' => 'Server Error! Check logs'
                ]
            ], 500);
        }
    }
}
