<?php

namespace App\Providers;

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isSuper', function (Admin $admin) {
            return $admin->role >= 1;
        });
        Gate::define('isAdmin', function (Admin $admin) {
            return $admin->role === 0;
        });
        Paginator::useBootstrap();
    }
}
