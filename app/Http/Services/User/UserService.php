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


class UserService
{
    public function register(UserRegistrationDTO $userDataDTO): bool
    {
         $user = new User([
            'name' => $userDataDTO->getName(),
            'role_name' => 'user',
            'surname' => $userDataDTO->getSurname(),
            'email' => $userDataDTO->getEmail(),
            'password' => bcrypt($userDataDTO->getPassword()),
            'email_verified_at' => Carbon::now(),
         ]);

        return $user->save();
    }

   public function login(UserLoginDTO $userLoginDataDTO): void
   {
       $user = User::where('email', $userLoginDataDTO->getEmail())->first();
       if ($user && Hash::check($userLoginDataDTO->getPassword(), $user->password)) {
           Auth::login($user);
       } else {
           abort(404);
       }
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
