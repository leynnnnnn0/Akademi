<?php

$db = get_database();

require 'Core/PersonalInformationForm.php';
require 'Core/Image.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST);
$personalInformationForm->image($_FILES['photo']);
try {
    $personalInformationForm->email($_POST['email'], "teachers");
} catch (Exception $e) {
    Errors::internal_server_error('/akademi/index.php/teachers');
}

if (!empty($personalInformationForm->errors)) {
    Errors::user_input_error($personalInformationForm->errors, $_POST);
    view('addTeacher.view.php', ['heading' => "Add New Teacher"]);
    return;
}

extract($_POST);
extract($_FILES['photo']);

if (Image::add($tmp_name, "asset/image/teachers/$name")) {
    try {
        $stmt = $db->query(
            "INSERT INTO teachers (image, firstName, middleInitial, lastName, dateOfBirth, email, phoneNumber, address) VALUES (:image, :firstName, :middleInitial, :lastName, :dateOfBirth, :email, :phoneNumber, :address);",
            [
                ":image" => $name,
                ":firstName" => $firstName,
                ":middleInitial" => $middleInitial,
                ":lastName" => $lastName,
                ":dateOfBirth" => $dateOfBirth,
                ":email" => $email,
                ":phoneNumber" => $phoneNumber,
                ":address" => $address
            ]
        );
        if ($stmt->rowCount() > 0) {
            Session::put('success', "New Teacher Added!");
            redirect('/akademi/index.php/teachers');
        }
    } catch (PDOException $_) {
        Errors::internal_server_error('/akademi/index.php/teachers');
    }
}

Errors::internal_server_error('/akademi/index.php/teachers');
