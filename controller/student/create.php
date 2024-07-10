<?php

$db = get_database();

require 'Core/PersonalInformationForm.php';
require 'Core/Image.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST);
$personalInformationForm->image($_FILES['photo']);
try{
    $personalInformationForm->email($_POST['email']);
}catch(Exception $e){
    Errors::internal_server_error('/akademi/index.php/students');
}

if (!empty($personalInformationForm->errors)) {
    Errors::user_input_error($personalInformationForm->errors, $_POST);
    view('addStudent.view.php', ['heading' => "Add New Student"]);
    return;
}

extract($_POST);
extract($_FILES['photo']);

if (Image::add($tmp_name, "asset/image/students/$name")) {
    try {
        $stmt = $db->query(
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
        if($stmt->rowCount() > 0){
            Session::put('success', "Added New Student!");
            redirect('/akademi/index.php/students');
        }
    }catch(PDOException $_) {
        Errors::internal_server_error('/akademi/index.php/students');
    }
}

Errors::internal_server_error('/akademi/index.php/students');
