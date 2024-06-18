<?php

namespace App\Helpers;

use JsonException;

class AESCryptHelper
{
    public static function encrypt($data)
    {
        $data = json_encode($data, JSON_THROW_ON_ERROR);

        $key = config('app.secret_key_aes');
        $key = hash('sha256', $key, true);

        $iv = hex2bin(config('app.iv_aes'));

        $ciphertext = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        return str_replace(['+', '/'], ['-', '_'], base64_encode($iv . $ciphertext));
    }

    public static function decrypt($payload)
    {
        $key = config('app.secret_key_aes');
        $key = hash('sha256', $key, true);
        $ciphertext = base64_decode(str_replace(['-', '_'], ['+', '/'], $payload));
        $iv = substr($ciphertext, 0, 16);
        $ciphertext = substr($ciphertext, 16);
        $data = openssl_decrypt($ciphertext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        return json_decode($data, true);
    }
}
