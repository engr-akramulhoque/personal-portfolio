<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // delete current tokens
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'You are successfully logged out.'
        ], 200);
    }
}
