<?php
$db = get_database();
$stmt = $db->query("SELECT * FROM school_events");
$events = $stmt->fetchAll();

echo json_encode($events);
