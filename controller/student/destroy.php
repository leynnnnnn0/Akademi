<?php

$id = $_POST['id'];

$db = get_database();

$stmt = $db->query("DELETE FROM students WHERE id = :id", [':id' => $id]);


