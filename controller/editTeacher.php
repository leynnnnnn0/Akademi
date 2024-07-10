<?php

$heading = "Edit Teacher Details";
$id = $_GET['id'];
$db = get_database();
$stmt = $db->query('SELECT * FROM teachers WHERE id = :id', [":id" => $id]);
$teacher = $stmt->fetch();

require "view/editTeacher.view.php";
