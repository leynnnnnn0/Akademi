<?php

$db = get_database();
$keyword = $_POST['query'] ?? '';
$query = $db->query(
    'SELECT * FROM TEACHERS WHERE LOWER(firstName) LIKE :keyword OR LOWER(lastName) LIKE :keyword',
    [':keyword' => '%' . strtolower($keyword) . '%']
);
$filteredTeachers = $query->fetchAll();

$output = '';
foreach ($filteredTeachers as $teacher) {
    $output .= "<div class='border-b border-indigo-100 mb-2'>
                    <div class='h-15 flex items-center p-2 gap-3'>
                        <div>
                            <img class='h-12 w-12 rounded-full' src='/akademi/asset/image/teachers/" . $teacher['image'] . "' alt='profile'>
                        </div>
                        <div class='flex flex-col '>
                            <h1 class='text-indigo-600 font-bold text-sm'>" . $teacher['firstName'] . " " . $teacher['lastName']   . "</h1>
                            <p class='text-[10px] text-gray-400'>Lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>";
}

if (Validator::is_null_or_empty($output)) {
    echo "<p class='text-lg font-bold text-indigo-500'>No result found.</p>";
} else {
    echo $output;
}
