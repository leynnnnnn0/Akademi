<?php

// Pages
$router->get("/akademi/", "controller/dashboard.php");
$router->get("/akademi/index.php/students", "controller/studentsList.php");
$router->get("/akademi/index.php/students/add", "controller/addStudent.php");
$router->get("/akademi/index.php/teachers", "controller/teachersList.php");
$router->get("/akademi/index.php/teachers/add", "controller/addTeacher.php");
$router->get("/akademi/index.php/events", "controller/event.php");

// Students
$router->post("/akademi/index.php/students/add", "controller/student/create.php");
$router->get("/akademi/index.php/students/edit", "controller/editStudent.php");
$router->post("/akademi/index.php/students/destroy", "controller/student/destroy.php");
$router->put("/akademi/index.php/students/edit", "controller/student/edit.php");

// Teachers
$router->post("/akademi/index.php/teachers/add", "controller/teacher/create.php");
$router->get("/akademi/index.php/teachers/edit", "controller/editTeacher.php");
$router->put("/akademi/index.php/teachers/edit", "controller/teacher/edit.php");

// Alerts 
$router->get("/akademi/index.php/result", "Core/sessionAlerts.php");
