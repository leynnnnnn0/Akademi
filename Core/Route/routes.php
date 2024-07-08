<?php

$router->get("/akademi/", "controller/dashboard.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
