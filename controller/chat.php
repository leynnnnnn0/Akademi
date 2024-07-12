<?php
$heading = "Chat";

$db = get_database();

$query = $_POST['query'] ?? " ";

$stmt = $db->query("SELECT * FROM teachers;");
$teachers = $stmt->fetchAll();


require 'view/chat.view.php';
