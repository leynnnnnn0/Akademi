<?php

class Teacher extends Person {
    public function __construct(string $profilePicture, string $firstName, string $lastName, DateTime $dateOfBirth, string $email, string $phoneNumber, string $address, string $middleName = ''){
        parent::__construct($profilePicture, $firstName, $lastName, $dateOfBirth, $email, $phoneNumber, $address, $middleName);
    }
}