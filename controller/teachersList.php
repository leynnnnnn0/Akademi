<?php

$db = get_database();
$heading = "Teachers";

$stmt = $db->query("SELECT * FROM teachers;");
$teachers = $stmt->fetchAll();

require 'view/teachersList.view.php';
