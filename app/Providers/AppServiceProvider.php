<?php

namespace App\Providers;
use Laravel\Horizon\Horizon;
use Illuminate\Support\ServiceProvider;
use Schema;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Horizon::auth(function ($request) {
            // return true / false;

            return auth()->user()->id == 1;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
