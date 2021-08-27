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

        view()->composer('layouts.instructorapp', function($view){
            $view->with('alerts', \App\AlertForStudent::with('shedulealert')->where('student_id', Auth::user()->id)->where('alert_status', 0)->orderBy('created_at', 'DESC')->get());
        });

        view()->composer('layouts.ownerapp', function($view){
            $view->with('newmessages', \App\Message::where('to',Auth::user()->id)->where('has_read',0)->get());
        });

        view()->composer('layouts.instructorapp', function($view){
            $view->with('newmessages', \App\Message::where('to',Auth::user()->id)->where('has_read',0)->get());
        });

        view()->composer('layouts.student', function($view){
            $view->with('newmessages', \App\Message::where('to',Auth::user()->id)->where('has_read',0)->get());
        });

        view()->composer('layouts.ownerapp', function($view){
            $view->with('shedulealerts', \App\SheduleRequest::where('status', 0)->count());
        });

        view()->composer('layouts.ownerapp', function($view){
            $view->with('requestalerts', \App\RequestAlert::where('status', 0)->count());
        });

        view()->composer('welcome', function($view){
            $view->with('companydetails', \App\CompanyDetails::first());
        });

        view()->composer('welcome', function($view){
            $view->with('instructors', \App\User::where('role_id',2)->get());
        });

        view()->composer('welcome', function($view){
            $view->with('openhours', \App\OpenHour::all());
        });

        view()->composer('layouts.landingpage', function($view){
            $view->with('companydetailfooter', \App\CompanyDetails::first()->get());
        });
    }
}
