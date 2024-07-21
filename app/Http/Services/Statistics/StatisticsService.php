<?php

namespace App\Http\Services\Statistics;
use App\Http\Services\RouteService\RedirectOrViewService;


use Illuminate\Support\Facades\Storage;


class StatisticsService
{
    public function __construct(protected RedirectOrViewService $routeService)
    {}

    public function getPostStatistic()
    {
       return $this->routeService->getUserPostsCount();
    }

    public function getNotificationStatistic()
    {
        return $this->routeService->getNotification()->count();
    }

    public function getNewsStatistics()
    {
        return $this->routeService->getUserNewsCount();
    }

    public function getDbTablesStatistics()
    {
        return $this->routeService->getDbTablesCount();
    }



}

?>
