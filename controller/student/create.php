<?php

$config = require 'Core/database/config.php';
$db = new Database($config['database']);

require 'Core/PersonalInformationForm.php';
$personalInformationForm = new PersonalInformationForm();
if (!$personalInformationForm->is_valid($_POST, $_FILES['photo'])) {
    $_SESSION['errors'] = $personalInformationForm->errors;
    header('location: /akademi/index.php/students/add');
}

extract($_POST);
$fileName = $_FILES['photo']['name'];
$tempName = $_FILES['photo']['tmp_name'];
$folder = "asset/image/students/$fileName";

if (move_uploaded_file($tempName, $folder)) {
    $db->query(
        "INSERT INTO students (image, firstName, middleName, lastName, dateOfBirth, email, phoneNumber, address) VALUES (:image, :firstName, :middleName, :lastName, :dateOfBirth, :email, :phoneNumber, :address);",
        [
            ":image" => $fileName,
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
}

dd("ERROR");
