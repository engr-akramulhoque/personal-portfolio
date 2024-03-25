<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = Auth::attempt($request->validated());
        if (!$user) {
            return response()->json([
                'status' => false,
                'error' => 'Invalid email or password',
            ], 401);
        }
        // delete current tokens
        $request->user()->tokens()->delete();
        // response access token
        return response()->json([
            'status' => true,
            'token' => $request->user()->createToken(
                'access_token',
                ['*'],
                now()->addWeek()
            )->plainTextToken
        ]);
    }
}
