<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        if (
            Auth::attempt([
                'email' => $loginRequest->email,
                'password' => $loginRequest->password
            ])
        ) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user->only(['name', 'email', 'created_at', 'updated_at']),
                'role' => $user->roles->pluck('name')->implode(', '),
                'token' => $token,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password'
        ], 401);
    }
}
