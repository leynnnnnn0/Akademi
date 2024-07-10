<?php

$db = get_database();

require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST);
$personalInformationForm->image($_FILES['photo']);
$personalInformationForm->email($_POST['email']);

if (!empty($personalInformationForm->errors)) {
    Session::put('errors', $personalInformationForm->errors);
    Session::put('details', $_POST);
    view('addStudent.view.php', ['heading' => "Add New Student"]);
    return;
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
    echo "success";
    redirect('/akademi/index.php/students');
}
