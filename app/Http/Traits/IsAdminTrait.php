<?php

namespace App\Http\Traits;

trait IsAdminTrait
{
    public function isAdmin(): bool
    {
        $auth = auth()->check();

        if($auth){
            $admin = auth()->user()->role_name;
            if($admin == 'admin'){
               return true;
            }else{
                return false;
            }
        }else{
                return false;
        }
    }
}


?>
