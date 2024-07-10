<?php

$id = $_GET['id'];
$db = get_database();
$currentEmail = $_POST['current_email'];
require 'Core/Image.php';
require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST);
if ($_FILES['photo']['size'] != 0) {
    $personalInformationForm->image($_FILES['photo']);
}
if ($currentEmail !== $_POST['email']) {
    try {
        $personalInformationForm->email($_POST['email'], "teachers");
    } catch (PDOException $_) {
        Errors::internal_server_error("/akademi/index.php/teachers");
    }
}

if (!empty($personalInformationForm->errors)) {
    Errors::user_input_error($personalInformationForm->errors, $_POST);
    view('editTeacher.view.php', ['heading' => "Edit Teachers Details"]);
    return;
}

extract($_POST);

if ($_FILES['photo']['size'] != 0) {
    extract($_FILES['photo']);
    if (Image::add($tmp_name, "asset/image/teachers/$name")) {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . "/akademi/asset/image/teachers/$currentImage";
        Image::remove($filePath);
    } else {
        Errors::internal_server_error("/akademi/index.php/teachers");
    }
}

$photo = $_FILES['photo']['name'] !== "" ? $_FILES['photo']['name'] : $currentImage;

try {
    $db->query(
        "UPDATE teachers SET 
        image = :image,
        firstName = :firstName,
        middleInitial = :middleInitial,
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
            ":middleInitial" => $middleInitial,
            ":lastName" => $lastName,
            ":dateOfBirth" => $dateOfBirth,
            ":email" => $email,
            ":phoneNumber" => $phoneNumber,
            ":address" => $address
        ]

    );

    Session::put("success", "Updated Successfully!");
    redirect("/akademi/index.php/teachers");
} catch (PDOException $_) {
    dd($_);
    Errors::internal_server_error("/akademi/index.php/teachers");
}
