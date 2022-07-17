<?php

namespace App\Helpers;

class RandomHelper
{
    public const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function generateRandomString($length = 12): string
    {
        $randomString = '';
        $sumPermittedChars = strlen(self::PERMITTED_CHARS);

        for ($i = 0; $i < $length; $i++) {
            $randomNumber = mt_rand(0, $sumPermittedChars - 1);
            $randomChar = self::PERMITTED_CHARS[$randomNumber];
            $randomString .= $randomChar;
        }

        return $randomString;
    }
}
