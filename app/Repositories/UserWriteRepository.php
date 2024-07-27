<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserWriteRepositoryInterface;
use App\Http\DTO\User\UserRegistrationDTO;
use App\Http\DTO\User\UserLoginDTO;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function register(UserRegistrationDTO $userDataDTO): void
    {
         $user = new User([
            'name' => $userDataDTO->getName(),
            'role_name' => 'user',
            'surname' => $userDataDTO->getSurname(),
            'email' => $userDataDTO->getEmail(),
            'password' => bcrypt($userDataDTO->getPassword()),
            'email_verified_at' => Carbon::now(),
         ]);
         $user->save() ?? abort(404);
    }

    public function login(UserLoginDTO $userLoginDataDTO): void
    {
        $user = User::where('email', $userLoginDataDTO->getEmail())->first();
        $user && Hash::check($userLoginDataDTO->getPassword(), $user->password ? Auth::login($user) : abort(404);
    }
}

?>
