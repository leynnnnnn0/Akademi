<?php
$db = get_database();
$receiver_id = $_POST['id'] ?? $_SESSION['receiver_id'];
if ($receiver_id) {
    $_SESSION['receiver_id'] = $receiver_id;
}
$sender_id = $_SESSION['user']['id'];

$stmt = $db->query('SELECT * FROM teachers WHERE id = :receiver_id', [':receiver_id' => $_SESSION['receiver_id']]);

$stmt2 = $db->query('SELECT * FROM messages WHERE sender_id = :sender_id AND receiver_id = :receiver_id OR receiver_id = :sender_id and sender_id = :receiver_id ORDER BY id ASC;', [':receiver_id' => $_SESSION['receiver_id'], ':sender_id' => $sender_id]);

$teacher = $stmt->fetch();
$messages = $stmt2->fetchAll();

$msgs = "";

foreach ($messages as $message) {
    if ($message['receiver_id'] === $sender_id) {
        $msgs .= '<div class="w-fit bg-indigo-500 text-white px-3 py-1 rounded-full">' . $message['message'] . '</div>';
    } else {
        $msgs .= '<div class="w-fit bg-indigo-500 text-white px-3 py-1 rounded-full self-end">' . $message['message'] . '</div>';
    }
}


echo "<div class='flex gap-3 items-center h-20 border-b border-indigo-100'>
<img class='h-12 w-12 rounded-full' src='/akademi/asset/image/teachers/" . $teacher['image'] . "' alt='profile'>
<div class='flex flex-col'>
    <h1 class='text-indigo-600 font-bold text-md'>" . $teacher['firstName'] . " " . $teacher['lastName'] . "</h1>
    <p class='text-xs text-gray-400'>
        <span class='text-green-400'><i class='bi bi-circle-fill'></i></span>
        Online
    </p>
    <input type='text' hidden name='receiverId' value='" . $receiver_id . "'>
    <input type='text' hidden name='senderId' value='" . $sender_id . "'>
</div>
</div>
<div class='flex flex-col gap-2 flex-1 p-2 overscroll-contain'>" . $msgs . "</div>";



// <div class='flex items-center h-20 gap-2'>
// <input class='border w-full border-indigo-200 rounded-full' type='text' id='messageInput' placeholder='Write your message'>
// <button id='sendMessageButton' data-receiver='" . $receiver_id . "' data-sender='" . $sender_id . "'><span class='font-bold text-2xl text-indigo-600'><i class='bi bi-send'></i></span></button>
// </div>"