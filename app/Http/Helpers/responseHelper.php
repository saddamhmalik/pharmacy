<?php
use Illuminate\Http\JsonResponse;

function successResponse($data, $message = "Request was successful", $statusCode = 200): JsonResponse
{
    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $data,
    ], $statusCode);
}

function errorResponse($message = "An error occurred", $statusCode = 400, $errors = []): JsonResponse
{
    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors
    ], $statusCode);
}



