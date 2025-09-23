<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(): JsonResponse
    {
        $user = auth()->user();
        $roles = $user->roles()->pluck('name')->toArray();
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'roles' => $roles
            ]
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $user = auth()->user();
        $user->name = $validated['name'];
        $user->save();
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function logout(): JsonResponse
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }

}
