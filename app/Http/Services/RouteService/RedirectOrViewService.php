<?php
namespace App\Http\Services\RouteService;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ImageFlows;
use App\Models\Notification;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;



class RedirectOrViewService
{

    public function getNotification()
    {
        return Notification::query()->get();
    }

    public function imageFlow()
    {
        return ImageFlows::query()->first();
    }

    public function getSettings()
    {
        return Settings::query()->first();
    }

    public function getUser()
    {
        $userInfo = User::query()->where('id', auth()->id())->first();
        $userInfo->load(['posts','educations','skills','information','news']);

        return $userInfo;
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
