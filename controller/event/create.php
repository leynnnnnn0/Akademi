<?php

extract($_POST);
$db = get_database();
if ($_POST['title'] === "") {
    echo json_encode(["success" => false]);
    return;
}
$stmt = $db->query("INSERT INTO school_events (title, start_date, end_date) VALUES (:title, :start_date, :end_date);", [":title" => $title, ":start_date" => $start, ":end_date" => $end]);


if ($stmt->rowCount() > 0) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
