<?php

namespace App\Providers;

use App\Contracts\InterfaceUser;
use App\Contracts\InterfaceAdmin;
use App\Services\ServiceUserInterface;
use App\Services\ServiceAdminInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceAdmin::class, ServiceAdminInterface::class);
        $this->app->bind(InterfaceUser::class, ServiceUserInterface::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
