<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<!-- add teacher button -->
<div class="flex justify-end">
    <button class="bg-indigo-600 text-white text-sm px-5 py-3 text-semibold rounded-full cursor-pointer"><span><i class="bi bi-plus-lg"></i></span> New Teacher</button>
</div>

<div class="flex gap-5 mt-4">
    <div class="flex flex-col gap-2 items-center h-48 w-48 bg-white p-4 rounded-2xl">
        <img src="/akademi/asset/image/empty.png" class="h-16" alt="profile picture">
        <p class="text-indigo-900 font-bold text-md">Dimitris Viga</p>
        <p class="text-gray-500 font-light text-xs">Mathematics</p>
        <div class="flex items-center gap-2 mt-2">
            <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-telephone"></i></span>
            <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-envelope"></i></span>
        </div>
    </div>
    <div class="flex flex-col gap-2 items-center h-48 w-48 bg-white p-4 rounded-2xl">
        <img src="/akademi/asset/image/empty.png" class="h-16" alt="profile picture">
        <p class="text-indigo-900 font-bold text-md">Dimitris Viga</p>
        <p class="text-gray-500 font-light text-xs">Mathematics</p>
        <div class="flex items-center gap-2 mt-2">
            <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-telephone"></i></span>
            <span class="cursor-pointer text-white font-bold text-lg bg-indigo-900 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-envelope"></i></span>
        </div>
    </div>
</div>
<?php
require 'view/partial/footer.php';
?>