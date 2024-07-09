<?php

$config = require 'Core/database/config.php';
$db = new Database($config['database']);
$heading = "Edit Student Details";


$stmt = $db->query("SELECT * FROM students WHERE id = :id", [":id" => $_GET['id']]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

require 'view/editStudent.view.php';
