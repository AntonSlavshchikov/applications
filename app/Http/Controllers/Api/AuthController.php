<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Auth\LoginAction;
use App\Actions\Api\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @param RegisterAction $action
     * @return Response
     */
    public function register(RegisterRequest $request, RegisterAction $action): Response
    {
        return $action($request);
    }

    /**
     * Login user
     *
     * @param LoginRequest $request
     * @param LoginAction $action
     * @return Response
     */
    public function login(LoginRequest $request, LoginAction $action): Response
    {
        return $action($request);
    }

    /**
     * Info auth user
     *
     * @return Response
     */
    public function me(): Response
    {
        return response([
            'user' => auth()->user()
        ]);
    }

    /**
     * Logout
     *
     * @return Response
     */
    public function logout(): Response
    {
        Auth::logout();
        return response(null, 204);
    }
}
