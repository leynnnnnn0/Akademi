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

function flashError(string $key)
{
    if (isset($_SESSION['errors'][$key])) {
        return $_SESSION['errors'][$key];
    }
}
