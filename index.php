<?php

require 'Core/functions.php';
require 'Core/Route/Router.php';
$router = new Router();
require 'Core/Route/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

isUrl("/akademi/");

$router->route($uri, $method);