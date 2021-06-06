<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contactus', 'landingpage\ContactusController@index')->name('contactus');
Route::get('/gallery', 'landingpage\GalleryControllere@index')->name('gallery');
Route::get('/roadsigns', 'landingpage\RoadsignsController@index')->name('roadsigns');
Route::get('/prices', 'landingpage\PricesController@index')->name('prices');
Route::get('/rmvregulations', 'landingpage\RMVregulationsController@index')->name('rmvregulations');
Route::get('/onlinepaper', 'landingpage\OnlinepaperController@index')->name('onlinepaper');
Route::get('/services','landingpage\ServicesCotroller@index')->name('services');

// create route group for owner
Route::group(['as' => 'owner.', 'prefix' => 'owner', 'namespace' => 'Owner', 'middleware' => ['auth', 'owner']],
    function(){
        Route::get('dashboad', 'OwnerDashboadController@index')->name('ownerdashboad');
    }
);

Route::group(['as' => 'instructor.', 'prefix' => 'instructor', 'namespace' => 'Instructor', 'middleware' => ['auth', 'instructor']],
    function(){
        Route::get('dashboad', 'InstructorDashboadController@index')->name('instructordashboad');
    }
);

Route::group(['as' => 'student.', 'prefix' => 'student', 'namespace' => 'Student', 'middleware' => ['auth', 'student']],
    function(){
        Route::get('dashboad', 'StudentDashboadController@index')->name('studentdashboad');
    }
);

// create route for access page through middleware
Route::get('/viewrequist', 'Owner\ViewrequestController@index')->name('viewrequest')->middleware('checkrequest');


// create route group with middleware
Route::middleware('checkrequest')->group(function(){

    Route::get('/instructors', 'Owner\IntructorsController@index')->name('instructors');
    Route::get('/addinstructor', 'Owner\addinstructorcontroller@index')->name('addinstructor');
    Route::post('/addinstructor', 'Owner\addinstructorcontroller@insertinstructor')->name('insertinstructor');

    Route::get('/studentslist', 'Owner\StudentsController@index')->name('studentslist');
    Route::get('/addstudent', 'Owner\StudentsController@addstudent')->name('addstudent');
    Route::post('/addstudent', 'Owner\StudentsController@insertstudent')->name('insertstudent');

    Route::get('/viewstudent/{user_id}', 'Owner\StudentsController@viewstudent')->name('viewstudent');

    //testing insert student route
    Route::get('/testinginsert', 'Owner\StudentsController@testinsertstudent')->name('testinsert');


    Route::get('/payments', 'Owner\paymentsController@index')->name('payments');

    Route::get('/shedulelist', 'Owner\ShedulingController@index')->name('ownershedulelist');
    Route::get('/addshedule', 'owner\ShedulingController@addshedule')->name('owneraddshedule');
    Route::get('/checkinput/{date}/{time}', 'owner\ShedulingController@checkinput')->name('checkinput');

    Route::get('/vehicles', 'Owner\VehicleController@index')->name('vehicles');
    Route::get('/addvehicles', 'Owner\VehicleController@addvehicle')->name('addvehicles');
    Route::post('/addvehicles', 'Owner\VehicleController@insertvehicle')->name('addvehicle');
    Route::get('/editvehicles/{id}', 'Owner\VehicleController@editvehicle')->name('editvehicle');
    Route::post('/updatevehicles/{id}', 'Owner\VehicleController@updatevehicle')->name('updatevehicle');
    Route::delete('/deletevehicles/{id}', 'Owner\VehicleController@deletevehicles')->name('deletevehicles');
    Route::post('/searchvehicle', 'Owner\VehicleController@searchvehicle')->name('searchvehicle');

    Route::get('/settings', 'Owner\SettingController@index')->name('settings');
});


// test routes
// Route::get('/viewstudent',function(){return view ('owner\viewstudent');});
