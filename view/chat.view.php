<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>
<div class="bg-white h-[600px] w-full rounded-2xl grid grid-cols-3">
    <div class="flex flex-col gap-5 h-full col-span-1 border-r border-indigo-100 p-5">
        <h1 class="text-indigo-600 font-bold text-lg">Messages</h1>
        <form action="">
            <input type="text" class="border w-full rounded-full border-indigo-600" placeholder="Search..." id="userSearchBar">
        </form>
        <div class="flex-1" id="teachersList">
            <?php foreach ($teachers as $teacher) : ?>
                <div onclick="getConversation(<?= $teacher['id'] ?>)" class="cursor-pointer border-b border-indigo-100 mb-2">
                    <div class="h-15 flex items-center p-2 gap-3">
                        <div>
                            <img class="h-12 w-12 rounded-full" src="/akademi/asset/image/teachers/<?= $teacher['image'] ?>" alt="profile">
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-indigo-600 font-bold text-sm"><?= $teacher['firstName'] ?> <?= $teacher['lastName'] ?></h1>
                            <p class="text-[10px] text-gray-400">Lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Column 2 -->
    <form class="col-span-2 h-full flex flex-col p-5" id="messageForm" method="post">
        <div id="conversationBox" class="flex-1">


        </div>
        <!-- <h1 class="text-center flex-1 font-bold text-indigo-600">Select a conversation to get started.</h1> -->
        <div class='flex items-center h-20 gap-2'>
            <input class='border w-full border-indigo-200 rounded-full' type='text' name="message" id='messageInput' placeholder='Write your message'>
            <button type="submit" id='sendMessageButton'><span class='font-bold text-2xl text-indigo-600'><i class='bi bi-send'></i></span></button>
        </div>
    </form>
</div>
<?php
require 'view/partial/footer.php';
?>