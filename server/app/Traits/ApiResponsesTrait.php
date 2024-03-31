<?php

namespace App\Traits;


trait ApiResponsesTrait
{
    public function dataResponse($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function successResponse($data, $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], 201);
    }

    public function errorResponse($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 400);
    }

    public function notFoundResponse($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 404);
    }

    public function unauthorizedResponse($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 401);
    }

    public function forbiddenResponse($message)
    {
        return $this->errorResponse('Forbidden. ' . $message)->header('Retry-After', 60);
    }
}
