<?php

namespace App\Actions\Api\Auth;

use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterAction
{
    public function __invoke(RegisterRequest $request): Response
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();

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
