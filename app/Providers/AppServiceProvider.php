<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Student;
use App\Observers\PointObserver;

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
        //
        // Student::observe(PointObserver::class);
    }
}
