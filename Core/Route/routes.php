<?php

$router->get("/akademi/", "controller/dashboard.php");
$router->get("/akademi/index.php/students", "controller/studentsList.php");
$router->get("/akademi/index.php/students/add", "controller/addStudent.php");
$router->get("/akademi/index.php/teachers", "controller/teachersList.php");
$router->get("/akademi/index.php/teachers/add", "controller/addTeacher.php");
