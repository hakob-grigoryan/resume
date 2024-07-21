<?php

namespace App\Http\DTO\User;

class UserLoginDTO
{
    public function __construct(
         private string $email,
         private string $password
    )
    {}

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
