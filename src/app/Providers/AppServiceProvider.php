<?php

namespace App\Providers;

use App\Playground\Interfaces\Repositories\IRepoRepository;
use App\Playground\Interfaces\Repositories\IUserRepository;
use App\Playground\Interfaces\Services\IRepoService;
use App\Playground\Interfaces\Services\IUserService;
use App\Playground\Repositories\RepoRepository;
use App\Playground\Repositories\UserRepository;
use App\Playground\Services\RepoService;
use App\Playground\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * USER SR
         */
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);

        /**
         * REPO SR
         */
        $this->app->bind(IRepoService::class, RepoService::class);
        $this->app->bind(IRepoRepository::class, RepoRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
