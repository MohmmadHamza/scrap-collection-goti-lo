<?php

namespace App\Helpers;

class ApiResponseHelper
{
    /**
     * Create a standardized JSON response.
     *
     * @param  mixed  $message
     * @param  bool  $status
     * @param  int  $statusCode
     * @param  mixed  $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function createResponse($message, $status = true, $statusCode = 200, $data = null)
    {
        return response()->json([
            'status' => $status,
            'response_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
