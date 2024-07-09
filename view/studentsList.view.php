<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<div class="flex justify-end">
    <button class="bg-indigo-600 text-white text-sm px-5 py-3 text-semibold rounded-full cursor-pointer"><span><i class="bi bi-plus-lg"></i></span> New Student</button>
</div>
<!-- Students table -->
<div class="w-full bg-white rounded-2xl mt-4">
    <table class="w-full table-auto">
        <thead class="border-b text-indigo-600 text-left text-xs border-b-gray-200">
            <tr>
                <th class="p-4">Name</th>
                <th class="p-4">Id</th>
                <th class="p-4">Date of Birth</th>
                <th class="p-4">Address</th>
                <th class="p-4">Contact</th>
                <th class="p-4 w-10">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-b-gray-200">
                <td class="flex items-center gap-2 p-4 text-indigo-800 font-bold">
                    <img src="/akademi/asset/image/empty.png" alt="">
                    <p>Tony Soap</p>
                </td>
                <td class="p-4 text-indigo-600 text-sm font-semibold">#123456789</td>
                <td class="p-4 text-gray-500 text-xs">March 25, 2021</td>
                <td class="p-4 text-xs text-indigo-800">California, USA</td>
                <td class="p-4 text-xs text-indigo-800">
                    <div class="flex items-center gap-2">
                        <span class="cursor-pointer text-indigo-600 font-bold text-lg bg-indigo-200 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-telephone"></i></span>
                        <span class="cursor-pointer text-indigo-600 font-bold text-lg bg-indigo-200 rounded-full p-1 h-8 w-8 text-center"><i class="bi bi-envelope"></i></span>
                    </div>
                </td>
                <td class="p-4 text-center">
                    <span class="cursor-pointer "><i class="bi bi-three-dots-vertical"></i></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
require 'view/partial/footer.php';
?>