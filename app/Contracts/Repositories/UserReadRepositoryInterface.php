<?php

namespace App\Contracts\Repositories;

interface UserReadRepositoryInterface
{
    public function getUser();
    public function getNotification();
    public function getImageFlow();
    public function getSettings();
    public function getUserPostsCount();
    public function getUserNewsCount();
    public function getDbTablesCount();
}

?>
