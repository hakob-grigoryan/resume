<?php

namespace App\Http\Services\User;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\DTO\User\UserRegistrationDTO;
use App\Http\DTO\User\UserLoginDTO;
use App\Http\DTO\User\UserUpdateDTO;
use App\Contracts\Repositories\UserWriteRepositoryInterface;

class UserService
{
    public function  __construct(protected UserWriteRepositoryInterface $userWriteRepository) {}

    public function register(UserRegistrationDTO $userDataDTO): void
    {
        $this->userWriteRepository->register($userDataDTO);
    }

   public function login(UserLoginDTO $userLoginDataDTO): void
   {
        $this->userWriteRepository->login($userLoginDataDTO);
   }


   public function logout($session): void
    {
        Auth::logout();
        $session->invalidate();
        $session->regenerateToken();
    }

   public function updateUser(UserUpdateDTO $userUpdateDataDTO): bool {

       $user = User::find(auth()->id());

       if ($user){
           $user->name = $userUpdateDataDTO->getName();
           $user->surname = $userUpdateDataDTO->getSurname();
           $user->email = $userUpdateDataDTO->getEmail();
           $user->addres = $userUpdateDataDTO->getAddress();
           $user->phone = $userUpdateDataDTO->getPhone();
           $user->age = $userUpdateDataDTO->getAge();
           $user->gender = $userUpdateDataDTO->getGender();
           $user->languages = $userUpdateDataDTO->getLanguage();

           return $user->save();
       } else {
           return false;
       }
   }

}

?>
