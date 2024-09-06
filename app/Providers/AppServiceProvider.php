<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DAO\GameDAOInterface;
use App\DAO\GameDAO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GameDAOInterface::class, GameDAO::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
