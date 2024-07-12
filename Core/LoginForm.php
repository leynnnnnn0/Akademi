<?php

class LoginForm
{
    public $errors = [];
    public function validate_input($data)
    {
        extract($data);

        if (Validator::is_null_or_empty($email)) {
            $this->errors['email'] = "This field is required";
            return;
        }
        if (Validator::is_null_or_empty($password)) {
            $this->errors["password"] = "This field is required";
            return;
        }

        if (!Validator::correct_password($data)) {

            $this->errors["password"] = "Incorrect password or email";
        }
    }
}
