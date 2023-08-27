<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Auth\LoginAction;
use App\Actions\Api\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterAction $action): Response
    {
        return $action($request);
    }

    public function login(LoginRequest $request, LoginAction $action): Response
    {
        return $action($request);
    }

    public function me(): Response
    {
        return response(null, 204);
    }

    public function logout(): Response
    {
        return response(null, 204);
    }
}
