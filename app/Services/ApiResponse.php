<?php
/**
 * Created by PhpStorm.
 * User: shaila
 * Date: 2/8/17
 * Time: 12:34 PM
 */

namespace App\Services;


class ApiResponse
{
    public static function get($status, $userMessage, $internalMessage, $data = [], $errors = [])
    {
        return [
            'status' => $status,
            'userMessage' => $userMessage,
            'internalMessage' => $internalMessage,
            'data' => $data,
            'errors' => $errors
        ];
    }
}