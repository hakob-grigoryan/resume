<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Repositories\UserWriteRepositoryInterface;
use App\Contracts\Repositories\UserReadRepositoryInterface;
use App\Repositories\UserWriteRepository;
use App\Repositories\UserReadRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );

        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );
    }
}

?>
