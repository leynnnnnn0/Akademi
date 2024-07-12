<?php

extract($_POST);
if (Validator::is_null_or_empty($_POST['message'])) {
    echo json_encode(['status' => 'error', 'message' => 'Message should not be empty']);
    return;
}
$db = get_database();

$stmt = $db->query("INSERT INTO messages (message, sender_id, receiver_id) VALUES (:message, :sender_id, :receiver_id)", [
    ":message" => $message,
    ":sender_id" => $sender_id,
    ":receiver_id" => $receiver_id,
]);

echo json_encode(['status' => 'success', 'message' => 'Message sent.']);
