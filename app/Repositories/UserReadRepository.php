<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserReadRepositoryInterface;
use App\Http\DTO\User\UserRegistrationDTO;
use App\Http\DTO\User\UserLoginDTO;
use App\Models\User;
use App\Models\Notification;
use App\Models\ImageFlows;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function getUser()
    {
        $userInfo = User::query()->where('role_name', 'admin')->first();
        $userInfo->load(['posts','educations','skills','information','news']);

        return $userInfo;
    }

    public function getNotification()
    {
         return Notification::query()->get();
    }

    public function getImageFlow()
    {
         return ImageFlows::query()->first();
    }

    public function getSettings()
    {
        return Settings::query()->first();
    }

    public function getUserPostsCount()
    {
        $userPosts = User::query()->where('id', auth()->id())->first();
        $userPosts->load(['posts']);

        return $userPosts->posts->count();
    }

    public function getUserNewsCount()
    {
        $userPosts = User::query()->where('id', auth()->id())->first();
        $userPosts->load(['news']);

        return $userPosts->news->count();
    }

    public function getDbTablesCount()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        return count($tables);
    }

}


?>
