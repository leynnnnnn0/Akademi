<?php

class Image
{
    public static function add(string $tmp_name, string $location)
    {
        return move_uploaded_file($tmp_name, $location);
    }

    public static function remove(string $path)
    {
        unlink($path);
    }
}
