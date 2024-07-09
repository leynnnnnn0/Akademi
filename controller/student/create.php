<?php

$db = get_database();

require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST, $_FILES['photo']);

if (!empty($personalInformationForm->errors)) {
    Session::put('errors', $personalInformationForm->errors);
    Session::put('details', $_POST);
    view('addStudent.view.php', ['heading' => "Add New Student"]);
}

extract($_POST);
extract($_FILES['photo']);

if (move_uploaded_file($tmp_name, "asset/image/students/$name")) {
    $db->query(
        "INSERT INTO students (image, firstName, middleName, lastName, dateOfBirth, email, phoneNumber, address) VALUES (:image, :firstName, :middleName, :lastName, :dateOfBirth, :email, :phoneNumber, :address);",
        [
            ":image" => $name,
            ":firstName" => $firstName,
            ":middleName" => $middleInitial,
            ":lastName" => $lastName,
            ":dateOfBirth" => $dateOfBirth,
            ":email" => $email,
            ":phoneNumber" => $phoneNumber,
            ":address" => $address
        ]
    );
    redirect('location: /akademi/index.php/students');
}
