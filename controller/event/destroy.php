<?php 

$id = $_POST["id"];

$db = get_database();

$db->query("DELETE FROM school_events WHERE id = :id", [":id" => $id]);

echo json_encode(["success" => true]);