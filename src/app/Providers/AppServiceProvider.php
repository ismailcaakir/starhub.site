<?php

namespace App\Providers;

use App\Playground\Interfaces\Repositories\IUserRepository;
use App\Playground\Interfaces\Services\IUserService;
use App\Playground\Repositories\UserRepository;
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
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
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
