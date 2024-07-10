<?php
require 'view/partial/header.php';
require 'view/partial/sidebar.php';
require 'view/partial/banner.php';
?>
<!-- Counts -->
<div class="flex h-32 bg-white w-full rounded-2xl gap-2">
    <!-- Students -->
    <div class="grid grid-cols-2 h-32 w-48">
        <div class="flex items-center justify-center w-32">
            <img class="rounded-full bg-indigo-500 p-2 h-13" src="asset/image/Student.png" alt="Student">
        </div>
        <div class="flex flex-col justify-center items-center">
            <h6 class="text-gray-500 text-sm">Students</h6>
            <h1 class="font-bold text-indigo-600 text-3xl"><?= $studentsCount ?></h1>
        </div>
    </div>
    <!-- Teacher -->
    <div class="grid grid-cols-2 h-32 w-48">
        <div class="flex items-center justify-center w-32">
            <img class="rounded-full bg-orange-400 p-2 h-13" src="asset/image/Teacher.png" alt="Student">
        </div>
        <div class="flex flex-col justify-center items-center">
            <h6 class="text-gray-500 text-sm">Teachers</h6>
            <h1 class="font-bold text-indigo-600 text-3xl"><?= $teacherCount ?></h1>
        </div>
    </div>
    <!-- Events -->
    <div class="grid grid-cols-2 h-32 w-48">
        <div class="flex items-center justify-center w-32">
            <img class="rounded-full bg-yellow-400 p-2 h-13" src="asset/image/Calendar.png" alt="Student">
        </div>
        <div class="flex flex-col justify-center items-center">
            <h6 class="text-gray-500 text-sm">Events</h6>
            <h1 class="font-bold text-indigo-600 text-3xl">0</h1>
        </div>
    </div>
</div>

<!-- School Performance -->
<div class="bg-white h-64 mt-4 rounded-2xl p-4">
    <h1 class="font-bold text-lg text-indigo-600">School Performance</h1>
</div>

<!-- School Calendar -->
<div class="w-full h-96 grid grid-cols-2 gap-5 rounded-2xl mt-4">
    <div class="bg-white rounded-2xl p-4">
        <h1 class="font-bold text-lg text-indigo-600">School Calendar</h1>
        <div class="h-96" id="dashboard_calendar"></div>
    </div>
    <div class="bg-white rounded-2xl p-4">
        <h1 class="font-bold text-lg text-indigo-600">School Finance</h1>
        <div id="dashboard_chart"></div>
    </div>
</div>


<?php
require 'view/partial/footer.php'; ?>