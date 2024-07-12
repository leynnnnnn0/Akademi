<?php

require 'Core/LoginForm.php';

$loginForm = new LoginForm();

$loginForm->validate_input($_POST);

if ($loginForm->errors) {
    Errors::user_input_error($loginForm->errors, $_POST);
    view("signin.view.php");
}

$db = get_database();
$stmt = $db->query("SELECT * FROM teachers WHERE email = :email", [":email" => $_POST['email']]);

$user = $stmt->fetch();
Session::put("user", $user);

header("location: /akademi/");
