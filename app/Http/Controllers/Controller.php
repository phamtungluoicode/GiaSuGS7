<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function getResponse($status, $message, $code, $data = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }
}
