<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<div class="w-full">
    <div class="h-15 bg-indigo-600 py-2 px-5 rounded-t-2xl">
        <p class="text-white font-semibold text-lg">Personal Details</p>
    </div>
    <form class="grid grid-cols-2 gap-4 h-[400px] rounded-b-2xl bg-white p-5" method="post">
        <!-- Column 1 -->
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="photo" class="text-indigo-900 font-bold text-sm">Photo *</label>
                <input type="file" name="photo" id="photo" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="firstName" class="text-indigo-900 font-bold text-sm">First Name *</label>
                <input placeholder="John" type="text" name="firstName" id="firstName" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="middleInitial" class="text-indigo-900 font-bold text-sm">Middle Initial</label>
                <input placeholder="Hawt" type="text" name="middleInitial" id="middleInitial" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="lastName" class="text-indigo-900 font-bold text-sm">Last Name *</label>
                <input placeholder="Doe" type="text" name="lastName" id="lastName" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="dateOfBirth" class="text-indigo-900 font-bold text-sm">Date of Birth *</label>
                <input type="date" name="dateOfBirth" id="dateOfBirth" class="border border-gray-300 h-8 rounded-md">
            </div>

        </div>
        <!-- Column 2 -->
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="email" class="text-indigo-900 font-bold text-sm">Email *</label>
                <input placeholder="johndoe@gmail.com" type="email" name="email" id="email" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="phoneNumber" class="text-indigo-900 font-bold text-sm">Phone Number *</label>
                <input placeholder="92********" type="text" name="phoneNumber" id="phoneNumber" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="address" class="text-indigo-900 font-bold text-sm">Address *</label>
                <textarea placeholder="California, USA" type="text" name="address" id="address" class="border border-gray-300 h-20 rounded-md"></textarea>
            </div>
            <div class="flex h-full justify-end items-end">
                <div class="flex gap-2">
                    <a class="rounded-full px-4 py-1 border border-indigo-600 text-indigo-600" href="/akademi/index.php/teachers">Cancel</a>
                    <button type="submit" class="rounded-full px-4 py-1 bg-indigo-600 text-white">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require 'view/partial/footer.php';
?>