<?php

$config = require 'Core/database/config.php';
$db = new Database($config['database']);

require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
$personalInformationForm->is_valid($_POST, $_FILES['photo']);

if (!empty($personalInformationForm->errors)) {
    Session::put('errors', $personalInformationForm->errors);
    Session::put('details', $_POST);
    header('location: /akademi/index.php/students/add');
    die();
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
    header('location: /akademi/index.php/students');
    die();
}

dd("ERROR");
