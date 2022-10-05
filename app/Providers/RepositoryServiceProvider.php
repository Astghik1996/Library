<?php

namespace App\Providers;

use App\Contracts\BookContract;
use App\Contracts\BookLibraryContract;
use App\Contracts\LibraryContract;
use App\Contracts\LikeContract;
use App\Contracts\UserContract;
use App\Repositories\BookLibraryRepo;
use App\Repositories\BookRepo;
use App\Repositories\LibraryRepo;
use App\Repositories\LikeRepo;
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
        $this->app->bind(
            LibraryContract::class,
            LibraryRepo::class
        );
        $this->app->bind(
            BookLibraryContract::class,
            BookLibraryRepo::class
        );
        $this->app->bind(
            LikeContract::class,
            LikeRepo::class
        );
    }
}
