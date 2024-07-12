<?php
$db = get_database();
$id = $_POST['id'];

$stmt = $db->query('SELECT * FROM teachers WHERE id = :id', [':id' => $id]);

$teacher = $stmt->fetch();

echo "<div class='flex gap-3 items-center h-20 border-b border-indigo-100'>
<img class='h-12' src='/akademi/asset/image/empty.png' alt='profile'>
<div class='flex flex-col'>
    <h1 class='text-indigo-600 font-bold text-md'>" . $teacher['firstName'] . " " . $teacher['lastName'] . "</h1>
    <p class='text-xs text-gray-400'>
        <span class='text-green-400'><i class='bi bi-circle-fill'></i></span>
        Online
    </p>
</div>
</div>
<div class='flex-1'></div>
<div class='flex items-center h-20'>
<input class='border w-full border-indigo-200 rounded-full' type='text' placeholder='Write your message'>
</div>";
