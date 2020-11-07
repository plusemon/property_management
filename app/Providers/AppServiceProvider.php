<?php

namespace App\Providers;

use App\Agreement;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Check and expire agreements when period is over
        // Agreement::whereNull('incr_at')->each(function ($agreement) {
        //     if (Agreement::isExpired($agreement->id)) {
        //         $agreement->incr_at = today();
        //         $agreement->rent += ($agreement->rent * $agreement->incr)/100;
        //         $agreement->save();

        //     }
        // });
    }
}
