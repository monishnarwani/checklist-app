<?php

use App\Services\ApiResponse;
Use Illuminate\Support\Facades\App;

/* li -- Log Info */
if (!function_exists('li')) {
    function li($var)
    {
        $environment = App::environment();
        if ($environment == 'local') {
            \Log::info(print_r($var, true));
        }

    }
}


if (!function_exists('getConfig')) {
    function getConfig($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}

if (!function_exists('getApiResponse')) {

    function getApiResponse($status, $userMessage, $internalMessage, $data = [], $errors = [], $responceCode)
    {
        if (count($errors) <= 0) {
            $errors = (object)$errors;
        }

        return response(ApiResponse::get($status, $userMessage, $internalMessage, $data, $errors), $responceCode);
    }
}

if (!function_exists('trimText')) {
    function trimText($text, $length, $removeTags = true)
    {
        $content = '';
        if (!empty($text)) {
            $content = trim($text);
            if (is_int($length)) {
                if (strlen($content) > $length) {
                    $content = substr($content, 0, 20);
                }
            }
            if ($removeTags == true) {
                $content = strip_tags($content);
            }
        }

        return $content;
    }
}


