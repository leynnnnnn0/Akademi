<?php
$heading = "Dashboard";

$db = get_database();
$studentsCount = $db->query("SELECT * FROM students");
$count = count($studentsCount->fetchAll());
require 'view/dashboard.view.php';