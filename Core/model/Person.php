<?php

abstract class Person
{
    protected int $id;
    protected string $profilePicture;
    protected string $firstName;
    protected string $middleName;
    protected string $lastName;
    protected DateTime $dateOfBirth;
    protected string $email;
    protected string $phoneNumber;
    protected string $address;

    protected function __construct(string $profilePicture, string $firstName, string $lastName, DateTime $dateOfBirth, string $email, string $phoneNumber, string $address, string $middleName = "")
    {
        $this->profilePicture = $profilePicture;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->middleName = $middleName;
    }
}
