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
    try {
        $personalInformationForm->email($_POST['email']);
    } catch (PDOException $_) {
        Errors::internal_server_error("/akademi/index.php/students");
    }
}

if (!empty($personalInformationForm->errors)) {
    Errors::user_input_error($personalInformationForm->errors, $_POST);
    view('editStudent.view.php', ['heading' => "Edit Student Details"]);
    return;
}

extract($_POST);

if ($_FILES['photo']['size'] != 0) {
    extract($_FILES['photo']);
    if (move_uploaded_file($tmp_name, "asset/image/students/$name")) {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . "/akademi/asset/image/students/$currentImage";
        unlink($filePath);
    } else{
        Errors::internal_server_error("/akademi/index.php/students");
    }
}

$photo = $_FILES['photo']['name'] ?? $currentImage;

try {
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

    Session::put("success", "Updated Successfully!");
    redirect("/akademi/index.php/students");
} catch (PDOException $_) {
    Errors::internal_server_error("/akademi/index.php/students");
}
