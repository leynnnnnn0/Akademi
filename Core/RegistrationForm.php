<?php

class RegistrationForm
{
    public $errors = [];
    public function validate_input($data)
    {
        extract($data);
        if (Validator::email($email)) {
            $this->errors['email'] = "Please input a valid email";
        }
        if (Validator::is_email_unique($email, "accounts")) {
            $this->errors["email"] = "Email is already used.";
        }
        if (Validator::is_null_or_empty($username)) {
            $this->errors["username"] = "Username can't be empty.";
        }
        if (Validator::password($password)) {
            $this->errors["password"] = "Password should be atleast 8 characters.";
        }
    }

    public function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
