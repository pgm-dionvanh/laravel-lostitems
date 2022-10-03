<?php

namespace App\Dtos\User;

class NewUserDto
{
    public function __construct(
        private string $email,
        private string $password,
        private string $userAgent
    ) {}


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }
}
