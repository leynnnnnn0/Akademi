<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>

<div class="w-full">
    <div class="h-15 bg-indigo-600 py-2 px-5 rounded-t-2xl">
        <p class="text-white font-semibold text-lg">Personal Details</p>
    </div>
    <form class="grid grid-cols-5 gap-4 h-fit rounded-b-2xl bg-white p-5" method="post" enctype="multipart/form-data">
        <!-- Column 0 -->
        <div>
            <input type="text" name="id" hidden value="<?= $student['id'] ?>">
            <img src="/akademi/asset/image/students/<?= Session::get_recent_input('currentImage') ?? $student['image'] ?>" class="h-24 w-24 rounded-full" alt="profile">
            <input type="text" hidden value="PUT" name="_method">
            <input type="text" hidden value="<?= Session::get_recent_input('currentImage') ?? $student['image'] ?>" name="currentImage">
            <input type="text" hidden name="current_email" value="<?= Session::get_recent_input('current_email') ?? $student['email'] ?>" />
        </div>
        <!-- Column 1 -->
        <div class="flex flex-col gap-2 col-span-2">
            <div class="flex flex-col gap-2">

                <label for="photo" class="text-indigo-900 font-bold text-sm">Photo</label>
                <input type="file" accept=".jpg, .png, .jpeg" name="photo" id="photo" class="border border-gray-300 h-8 rounded-md" value="<?= $student['image'] ?>">
            </div>
            <div class="flex flex-col gap-2 ">
                <label for="firstName" class="text-indigo-900 font-bold text-sm">First Name *</label>
                <input placeholder="John" type="text" name="firstName" id="firstName" class="border border-gray-300 h-8 rounded-md" value="<?= Session::get_recent_input('firstName') ?? $student['firstName'] ?>">
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('firstName') ?>
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="middleInitial" class="text-indigo-900 font-bold text-sm">Middle Initial</label>
                <input placeholder="Hawt" type="text" name="middleInitial" id="middleInitial" class="border border-gray-300 h-8 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="lastName" class="text-indigo-900 font-bold text-sm">Last Name *</label>
                <input placeholder="Doe" type="text" name="lastName" id="lastName" class="border border-gray-300 h-8 rounded-md" value="<?= Session::get_recent_input('lastName') ?? $student['lastName'] ?>">
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('lastName') ?>
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="dateOfBirth" class="text-indigo-900 font-bold text-sm">Date of Birth *</label>
                <input type="date" name="dateOfBirth" id="dateOfBirth" class="border border-gray-300 h-8 rounded-md" value="<?= Session::get_recent_input('dateOfBirth') ?? $student['dateOfBirth'] ?>">
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('dateOfBirth') ?>
                </p>
            </div>

        </div>
        <!-- Column 2 -->
        <div class="flex flex-col gap-2 col-span-2">
            <div class="flex flex-col gap-2">
                <label for="email" class="text-indigo-900 font-bold text-sm">Email *</label>
                <input placeholder="johndoe@gmail.com" type="email" name="email" id="email" class="border border-gray-300 h-8 rounded-md" value="<?= Session::get_recent_input('email') ?? $student['email'] ?>">
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('email') ?>
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="phoneNumber" class="text-indigo-900 font-bold text-sm">Phone Number *</label>
                <input placeholder="92********" type="text" name="phoneNumber" id="phoneNumber" class="border border-gray-300 h-8 rounded-md" value="<?= Session::get_recent_input('phoneNumber') ?? $student['phoneNumber'] ?>">
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('phoneNumber') ?>
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="address" class="text-indigo-900 font-bold text-sm">Address *</label>
                <textarea placeholder="California, USA" type="text" name="address" id="address" class="border border-gray-300 h-20 rounded-md"><?= Session::get_recent_input('address') ?? $student['address'] ?></textarea>
                <p class="text-red-500 text-xs">
                    <?= Session::get_error('address') ?>
                </p>
            </div>
            <div class="flex h-full justify-end items-end">
                <div class="flex gap-2">
                    <a class="rounded-full px-4 py-1 border border-indigo-600 text-indigo-600" href="/akademi/index.php/students">Cancel</a>
                    <button type="submit" class="rounded-full px-4 py-1 bg-indigo-600 text-white">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require 'view/partial/footer.php';
?>