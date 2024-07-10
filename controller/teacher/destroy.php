<?php

$id = $_POST['id'];
$photo = $_POST['image'];

$db = get_database();

$db->query("DELETE FROM students WHERE id = :id", [':id' => $id]);

$filePath = $_SERVER['DOCUMENT_ROOT'] . "/akademi/asset/image/teachers/$photo";

unlink($filePath);
