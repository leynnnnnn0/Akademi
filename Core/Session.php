<?php

class Session
{
    public static function put(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get_error(string $key)
    {
        return $_SESSION['errors'][$key] ?? null;
    }

    public static function get_recent_input(string $key)
    {
        return $_SESSION['details'][$key] ?? null;
    }

    public static function unset()
    {
        unset($_SESSION['details']);
        unset($_SESSION['errors']);
    }
}
