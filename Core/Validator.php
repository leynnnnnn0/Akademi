<?php

class Validator
{
    public static function image(array $file): bool
    {
        if (empty($file["type"])) return true;

        $type = explode("/", $file["type"])[1];
        $validExt = ['png', 'jpg', 'jpeg'];

        if (!in_array($type, $validExt)) return true;

        return false;
    }

    public static function string(string $string): bool
    {
        return self::is_null_or_empty($string);
    }

    public static function email(string $email): bool
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function phone(string $phone): bool
    {
        return ((int) $phone) == 0 || strlen($phone) != 10;
    }

    public static function date(string $date)
    {
        return (date('Y-m-d', strtotime($date))) !== $date;
    }

    public static function strings(array $strings): bool
    {
        if (empty($strings)) return false;
        array_filter($strings, function ($value) {
            if (self::is_null_or_empty($value)) return true;
        });
        return false;
    }

    public static function is_null_or_empty($value)
    {
        return $value === null || empty($value);
    }
}
