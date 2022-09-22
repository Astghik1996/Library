<?php

namespace App\Providers;

use App\Contracts\BookContract;
use App\Contracts\UserContract;
use App\Repositories\BookRepo;
use App\Repositories\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app->bind(
            BookContract::class,
            BookRepo::class
        );
        $this->app->bind(
            UserContract::class,
            UserRepo::class
        );
    }
}
