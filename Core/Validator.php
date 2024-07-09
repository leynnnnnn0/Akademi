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

    public static function is_email_unique(string $email): bool
    {
        $config = require 'Core/database/config.php';
        $db = new Database($config['database']);
        $stmt = $db->query("SELECT * from students WHERE email = :email;", [":email" => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) return true;
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
        return strlen($phone) != 10;
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
