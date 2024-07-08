<?php

$router->get("/akademi/", "controller/dashboard.php");
$router->get("/akademi/index.php/students", "controller/studentsList.php");
$router->get("/akademi/index.php/teachers", "controller/teachersList.php");
