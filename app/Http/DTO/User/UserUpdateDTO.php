<?php

namespace App\Http\DTO\User;

class UserUpdateDTO
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $addres,
        private string $phone,
        private string $age,
        private null|string $gender,
        private null|string $languages,
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

    public function getAddress()
    {
        return $this->addres;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getLanguage(): ?string
    {
        return $this->languages;
    }
}

?>
