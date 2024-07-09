<?php

session_start();
require 'Core/functions.php';
require 'Core/database/Database.php';
require 'Core/Route/Router.php';
$router = new Router();
require 'Core/Route/routes.php';
require 'Core/Validator.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

