<?php

$db = get_database();
$currentEmail = $_POST['current_email'];

require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST);
if ($_FILES['photo']['size'] != 0) {
    $personalInformationForm->image($_FILES['photo']);
}
if ($currentEmail !== $_POST['email']) {
    $personalInformationForm->email($_POST['email']);
}

if (!empty($personalInformationForm->errors)) {
    Session::put('errors', $personalInformationForm->errors);
    Session::put('details', $_POST);
    view('editStudent.view.php', ['heading' => "Edit Student Details"]);
    return;
}

extract($_POST);

$db->query(
    "UPDATE students SET 
    image = :image,
    firstName = :firstName,
    middleName = :middleName,
    lastName = :lastName,
    dateOfBirth = :dateOfBirth,
    email = :email,
    phoneNumber = :phoneNumber,
    address = :address
    WHERE id = :id;
    ",
    [
        ":id" => $id,
        ":image" => $photo,
        ":firstName" => $firstName,
        ":middleName" => $middleInitial,
        ":lastName" => $lastName,
        ":dateOfBirth" => $dateOfBirth,
        ":email" => $email,
        ":phoneNumber" => $phoneNumber,
        ":address" => $address
    ]
);

redirect("/akademi/index.php/students");
exit();
