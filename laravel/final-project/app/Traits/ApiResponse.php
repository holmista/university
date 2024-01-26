<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($resourceData=null, $status=200)
    {
        return response()->json([
            'message' => 'success',
            'data' => $resourceData
        ], $status);
    }

    public function errorResponse($message, $status=500)
    {
        return response()->json([
            'message' => $message
        ], $status);
    }
}
