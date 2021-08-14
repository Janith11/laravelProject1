<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        view()->composer('*', function($view){
            $view->with('logo', \App\CompanyDetails::select('logo')->first());
        });

        view()->composer('layouts.student', function($view){
            $view->with('alerts', \App\AlertForStudent::with('shedulealert')->where('student_id', Auth::user()->id)->where('alert_status', 0)->orderBy('created_at', 'DESC')->get());
        });
        view()->composer('layouts.ownerapp', function($view){
            $view->with('newmessages', \App\Message::where('to',Auth::user()->id)->where('has_read',0)->get());
        });
    }
}
