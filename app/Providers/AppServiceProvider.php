<?php

namespace App\Providers;

use App\Models\UserTenant;
use App\Observers\UserObserver;
use App\Observers\UserTenantObserver;
use App\User;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        UserTenant::observe(UserTenantObserver::class);
    }
}
