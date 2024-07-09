<?php
$heading = "Students";

$config = require 'Core/database/config.php';
$db = new Database($config['database']);

$stmt = $db->query("SELECT * FROM students;");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'view/studentsList.view.php';
