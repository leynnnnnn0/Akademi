<div class="grid grid-cols-5 w-full h-full">
    <div class="flex flex-col bg-indigo-600 col-span-1 pl-8">
        <div class="flex items-center h-32">
            <img src="/akademi/asset/image/logo.png" height="20" width="30" alt="Logo">
            <h1 class="text-white font-bold text-2xl ml-2">AKADEMI</h1>
        </div>
        <div class="flex-1">
            <div class="flex items-center w-full h-12 text-indigo-50 rounded-l-3xl py-2 px-4 cursor-pointer <?= isUrl("/akademi/") ?>">
                <a href="/akademi/">
                    <span class="mr-4"><i class="bi bi-card-list"></i></span>
                    Dashboard
                </a>
            </div>
            <div class="flex items-center w-full h-12 py-2 px-4 rounded-l-3xl cursor-pointer <?= isUrl("/akademi/index.php/students") ?> <?= isUrl("/akademi/index.php/students/add") ?>">
                <a href="/akademi/index.php/students">
                    <span class="mr-4"><i class="bi bi-backpack"></i></span>
                    Students
                </a>
            </div>
            <div class="flex items-center w-full h-12 py-2 px-4 rounded-l-3xl  cursor-pointer <?= isUrl("/akademi/index.php/teachers") ?> <?= isUrl("/akademi/index.php/teachers/add") ?>">
                <a href="/akademi/index.php/teachers">
                    <span class="mr-4"><i class="bi bi-briefcase"></i></span>
                    Teachers
                </a>
            </div>
            <div class="flex items-center w-full h-12 text-indigo-50 py-2 px-4 rounded-l-3xl cursor-pointer <?= isUrl("/akademi/index.php/events") ?>">
                <a href="/akademi/index.php/events"><span class="mr-4"><i class="bi bi-calendar4-event"></i></span> Events</a>
            </div>
            <div class="flex items-center w-full h-12 text-indigo-50 py-2 px-4 rounded-l-3xl cursor-pointer <?= isUrl("/akademi/index.php/chats") ?>">
                <a href="/akademi/index.php/chats"><span class="mr-4"><i class="bi bi-chat"></i></span> Chats</a>
            </div>

        </div>
        <!-- Log out container -->
        <div class="h-20">
            <div class="flex items-center w-full h-12 text-indigo-50 rounded-l-3xl py-2 px-4 cursor-pointer <?= isUrl("/akademi/index.php/logout") ?>">
                <a href="/akademi/index.php/logout">
                    <span class="mr-4"><i class="bi bi-box-arrow-left"></i></span>
                    Log out
                </a>
            </div>
        </div>
    </div>
    <div class="bg-indigo-50 col-span-4">
        <div class="p-10">