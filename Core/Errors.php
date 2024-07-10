<?php

class Errors
{
    public static function internal_server_error($path)
    {
        Session::put('error', "Internal Server Error.");
        redirect('/akademi/index.php/students');
    }

    public static function user_input_error($errors, $inputs)
    {
        Session::put('errors', $errors);
        Session::put('details', $inputs);
    }
}
