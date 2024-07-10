<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<div class="flex justify-end">
    <a href="/akademi/index.php/students/add" class="bg-indigo-600 text-white text-sm px-5 py-3 text-semibold rounded-full cursor-pointer"><span><i class="bi bi-plus-lg"></i></span> New Student</a>
</div>
<!-- Students table -->
<div class="w-full bg-white rounded-2xl mt-4">
    <table class="w-full table-auto">
        <thead class="border-b text-indigo-600 text-left text-xs border-b-gray-200">
            <tr>
                <th class="p-4 w-2/6">Name</th>
                <th class="p-4">Id</th>
                <th class="p-4">Date of Birth</th>
                <th class="p-4">Address</th>
                <th class="p-4">Contact</th>
                <th class="p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr class="border-b border-b-gray-200">
                    <td class="flex items-center gap-2 p-4 text-indigo-800 font-bold">
                        <img src="/akademi/asset/image/students/<?= $student['image'] ?>" alt="" class="h-12 w-12 rounded-full mr-2">
                        <p><?= $student['firstName'] . " " . $student['lastName'] ?></p>
                    </td>
                    <td class="p-4 text-indigo-600 text-sm font-semibold"># <?= $student['id'] ?></td>
                    <td class="p-4 text-gray-500 text-xs"><?= $student['dateOfBirth'] ?></td>
                    <td class="p-4 text-xs text-indigo-800"><?= $student['address'] ?></td>
                    <td class="p-4 text-xs text-indigo-800">
                        <div class="flex items-center gap-2">
                            <span class="cursor-pointer text-indigo-600 font-bold text-lg bg-indigo-200 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-telephone"></i></span>
                            <span class="cursor-pointer text-indigo-600 font-bold text-lg bg-indigo-200 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-envelope"></i></span>
                        </div>
                    </td>
                    <td class="p-4 flex gap-2">
                        <a href="/akademi/index.php/students/edit?id=<?= $student['id'] ?>" class="cursor-pointer border-2 p-2 border-blue-400 rounded-lg text-blue-400"><i class="bi bi-pencil-square"></i></a>

                        <button type="submit" onclick="deleteAlert(<?= $student['id'] ?>, '<?= $student['image'] ?>')" class="cursor-pointer border-2 p-2 border-red-500 rounded-lg text-red-500"><i class="bi bi-trash3"></i></button>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require 'view/partial/footer.php';
?>