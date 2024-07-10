<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<!-- add teacher button -->
<div class="flex justify-end">
    <a href="/akademi/index.php/teachers/add" class="bg-indigo-600 text-white text-sm px-5 py-3 text-semibold rounded-full cursor-pointer"><span><i class="bi bi-plus-lg"></i></span> New Teacher</a>
</div>

<div class="flex flex-wrap gap-5 mt-4">
    <?php foreach ($teachers as $teacher) : ?>
        <a href="/akademi/index.php/teachers/edit?id=<?= $teacher['id'] ?>" class="flex flex-col gap-2 items-center h-auto w-48 bg-white p-4 rounded-2xl hover:opacity-75">
            <img src="/akademi/asset/image/teachers/<?= $teacher['image'] ?>" class="h-16 w-16 rounded-full" alt="profile picture">
            <p class="text-indigo-900 font-bold text-md text-center"><?= $teacher['firstName'] ?> <?= $teacher['lastName'] ?></p>
            <p class="text-gray-500 font-light text-xs"><?= $teacher['dateOfBirth'] ?></p>
            <div class="flex items-center gap-2 mt-2">
                <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-telephone"></i></span>
                <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-envelope"></i></span>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<?php
require 'view/partial/footer.php';
?>