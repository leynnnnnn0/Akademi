<?php

require 'Core/RegistrationForm.php';

$registrationForm = new RegistrationForm();
$registrationForm->validate_input($_POST);

if ($registrationForm->errors) {
    Errors::user_input_error($registrationForm->errors, $_POST);
    view("signup.view.php");
}
extract($_POST);

$db = get_database();

$db->query("INSERT INTO accounts (username, email, pwd) VALUES (:username, :email, :pwd);", [":username" => $username, ":email" => $email, ":pwd" => $registrationForm->hash_password($password)]);


header("location: /akademi/index.php/signin");
