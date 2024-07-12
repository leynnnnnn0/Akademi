<?php

function isUrl(string $uri)
{
    if ($uri === parse_url($_SERVER['REQUEST_URI'])['path']) {
        return "bg-indigo-50 text-indigo-600";
    } else {
        return "text-indigo-50";
    }
}

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function base_path(string $string)
{
    return __DIR__ . "/../" . $string;
}


function redirect(string $path)
{
    header("location: $path");
    die();
}

function get_database()
{
    $config = require 'Core/database/config.php';
    return new Database($config['database']);
}

function view($path, $data = [])
{
    extract($data);
    require "view/$path";
    die();
}

function internal_server_error($path)
{
    Session::put('error', "Internal Server Error.");
    redirect('/akademi/index.php/students');
}

function user_input_error($errors, $inputs)
{
    Session::put('errors', $errors);
    Session::put('details', $inputs);
}
