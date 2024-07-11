<?php
$heading = "Dashboard";

$db = get_database();
$studentsCount = $db->query("SELECT * FROM students");
$studentsCount = count($studentsCount->fetchAll());

$teacherCount = $db->query("SELECT * FROM teachers");
$teacherCount = count($teacherCount->fetchAll());

$eventsCount = $db->query("SELECT * FROM school_events;");
$eventsCount = count($eventsCount->fetchAll());

require 'view/dashboard.view.php';