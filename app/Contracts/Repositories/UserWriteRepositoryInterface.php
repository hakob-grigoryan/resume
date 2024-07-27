<?php

namespace App\Contracts\Repositories;

use App\Http\DTO\User\UserRegistrationDTO;
use App\Http\DTO\User\UserLoginDTO;

interface UserWriteRepositoryInterface
{
    public function register(UserRegistrationDTO $userDataDTO): void;
    public function login(UserLoginDTO $userLoginDataDTO): void;
}

?>
