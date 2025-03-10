<?php

// Pages
$router->get("/akademi/", "controller/dashboard.php")->only("authorized");
$router->get("/akademi/index.php/students", "controller/studentsList.php");
$router->get("/akademi/index.php/students/add", "controller/addStudent.php");
$router->get("/akademi/index.php/teachers", "controller/teachersList.php");
$router->get("/akademi/index.php/teachers/add", "controller/addTeacher.php");
$router->get("/akademi/index.php/events", "controller/event.php");
$router->get("/akademi/index.php/chats", "controller/chat.php");

// Students
$router->post("/akademi/index.php/students/add", "controller/student/create.php");
$router->get("/akademi/index.php/students/edit", "controller/editStudent.php");
$router->post("/akademi/index.php/students/destroy", "controller/student/destroy.php");
$router->put("/akademi/index.php/students/edit", "controller/student/edit.php");

// Teachers
$router->post("/akademi/index.php/teachers/add", "controller/teacher/create.php");
$router->get("/akademi/index.php/teachers/edit", "controller/editTeacher.php");
$router->put("/akademi/index.php/teachers/edit", "controller/teacher/edit.php");
$router->post("/akademi/index.php/teachers/destroy", "controller/teacher/destroy.php");

// Alerts 
$router->get("/akademi/index.php/result", "Core/sessionAlerts.php");

// Events 
$router->post("/akademi/index.php/events/add", "controller/event/create.php");
$router->get("/akademi/index.php/events/getAll", "controller/event/show.php");
$router->post("/akademi/index.php/events/delete", "controller/event/destroy.php");

// Chats
$router->post("/akademi/index.php/chats", "controller/chat/userLookUp.php");
$router->post("/akademi/index.php/chats/conversation", "controller/chat/getChats.php");
$router->post("/akademi/index.php/chats/conversation/send", "controller/chat/sendChat.php");


// Sign in and Sign up
$router->get("/akademi/index.php/signup", "controller/signup.php")->only("guest");
$router->post("/akademi/index.php/signup", "controller/registration/create.php");
$router->get("/akademi/index.php/signin", "controller/signin.php")->only("guest");
$router->post("/akademi/index.php/signin", "controller/authorization/authorize.php");

// Log out
$router->get("/akademi/index.php/logout", "controller/authorization/logout.php");
