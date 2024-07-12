<?php

require 'Core/LoginForm.php';

$loginForm = new LoginForm();

$loginForm->validate_input($_POST);

if ($loginForm->errors) {
    Errors::user_input_error($loginForm->errors, $_POST);
    view("signin.view.php");
}

header("location: /akademi/");
