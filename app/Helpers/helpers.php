<?php


if(!function_exists('response_json')) {
    function response_json(int $code, string $message = 'Success', string $type = 'success', array $array = [])
    {
        $data = [
            'code' => $code,
            'type' => $type,
            'message' => $message,
            'data' => $array,
        ];
        return response()->json($data, $code);
    }
}