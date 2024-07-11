<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>
<div class="bg-white h-[600px] w-full rounded-2xl grid grid-cols-3">
    <div class="flex flex-col gap-5 h-full col-span-1 border-r border-indigo-100 p-5">
        <h1 class="text-indigo-600 font-bold text-lg">Messages</h1>
        <form action="">
            <input type="text" class="border w-full rounded-full border-indigo-600" placeholder="Search...">
        </form>
        <div class="flex-1">
            <div class="border-b border-indigo-100 mb-2">
                <div class="h-full grid grid-cols-4 items-center p-2">
                    <div class="col-span-1">
                        <img class="h-12" src="/akademi/asset/image/empty.png" alt="profile">
                    </div>
                    <div class="flex flex-col col-span-3 ">
                        <h1 class="text-indigo-600 font-bold text-sm">John Doe</h1>
                        <p class="text-[10px] text-gray-400">Lorem ipsum dolor sit.</p>
                    </div>
                </div>
            </div>
            <div class="border-b border-indigo-100 mb-5">
                <div class="h-full grid grid-cols-4 items-center p-2">
                    <div class="col-span-1">
                        <img class="h-12" src="/akademi/asset/image/empty.png" alt="profile">
                    </div>
                    <div class="flex flex-col col-span-3 ">
                        <h1 class="text-indigo-600 font-bold text-sm">John Doe</h1>
                        <p class="text-[10px] text-gray-400">Lorem ipsum dolor sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-span-2 h-full flex flex-col p-5">
        <div class="flex gap-3 items-center h-20 border-b border-indigo-100">
            <img class="h-12" src="/akademi/asset/image/empty.png" alt="profile">
            <div class="flex flex-col">
                <h1 class="text-indigo-600 font-bold text-md">John Doe</h1>
                <p class="text-xs text-gray-400">
                    <span class="text-green-400"><i class="bi bi-circle-fill"></i></span>
                    Online
                </p>
            </div>
        </div>
        <div class="flex-1"></div>
        <div class="flex items-center h-20">
            <input class="border w-full border-indigo-200 rounded-full" type="text" placeholder="Write your message">
        </div>
    </div>
</div>
<?php
require 'view/partial/footer.php';
?>