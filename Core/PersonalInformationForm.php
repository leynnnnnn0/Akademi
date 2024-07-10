<?php

class PersonalInformationForm
{
    public $errors = [];

    public function image(array $photo)
    {
        if (Validator::image($photo)) {
            $this->errors["photo"] = 'Please input a valid photo';
        }
    }

    public function email($email, $table)
    {
        if (Validator::is_email_unique($email, $table)) {
            $this->errors['email'] = 'Email is already used';
        }
    }

    public function is_valid($informations)
    {
        extract($informations);
        if (Validator::string($firstName)) {
            $this->errors['firstName'] = 'First name is required';
        }
        if (Validator::string($lastName)) {
            $this->errors['lastName'] = 'Last name is required';
        }
        if (Validator::date($dateOfBirth)) {
            $this->errors['dateOfBirth'] = 'Date of birth is required';
        }
        if (Validator::email($email)) {
            $this->errors['email'] = 'Please input a valid email';
        }

        if (Validator::phone($phoneNumber)) {
            $this->errors['phoneNumber'] = 'Please input a valid phone number.';
        }
        if (Validator::string($address)) {
            $this->errors['address'] = "Address is required.";
        }
        return !empty($this->errors);
    }
}
