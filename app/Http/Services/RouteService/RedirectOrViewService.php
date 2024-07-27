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
use App\Contracts\Repositories\UserReadRepositoryInterface;

class RedirectOrViewService
{
    public function __construct(protected UserReadRepositoryInterface $userReadRepository){}

    public function getNotification()
    {
        return $this->userReadRepository->getNotification();
    }

    public function imageFlow()
    {
        return $this->userReadRepository->getImageFlow();

    }

    public function getSettings()
    {
        return $this->userReadRepository->getSettings();
    }

    public function getUser()
    {
        return $this->userReadRepository->getUser();
    }

    public function getUserPostsCount()
    {
        return $this->userReadRepository->getUserPostsCount();
    }

    public function getUserNewsCount()
    {
        return $this->userReadRepository->getUserNewsCount();
    }

    public function getDbTablesCount()
    {
        return $this->userReadRepository->getDbTablesCount();
    }
}

?>
