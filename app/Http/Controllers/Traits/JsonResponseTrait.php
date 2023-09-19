<?php

namespace App\Http\Controllers\traits;

use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
{
    public function responseJson($statusCode, $message, $data = null): JsonResponse
    {
        return response()->json([
            'status_code' => $statusCode ?? '',
            'message' => $message ?? '',
            'data' => $data ?? ''
        ]);
    }
}
