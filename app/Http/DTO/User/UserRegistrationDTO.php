<?php

namespace App\Http\DTO\User;

class UserRegistrationDTO
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $password
    )
    {}

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}

?>
