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

    Route::get('/students', 'Owner\StudentsController@index')->name('students');
    Route::get('/addstudent', 'Owner\addStudentController@index')->name('addstudent');
    Route::post('/addstudent', 'Owner\addStudentController@insertstudent')->name('insertstudent');

    Route::get('/payments', 'Owner\paymentsController@index')->name('payments');

    Route::get('/sheduling', 'Owner\ShedulingController@index')->name('ownersheduling');

    Route::get('/vehicles', 'Owner\VehicleController@index')->name('vehicles');
    Route::get('/addvehicles', 'Owner\AddvehicleController@index')->name('addvehicles');
    Route::post('/addvehicles', 'Owner\AddvehicleController@addvehicle')->name('addvehicle');
    Route::post('/addvehicles', ['as'=>'croppie.upload-image','uses'=>'Owner\AddvehicleController@uploadCropImage']);

    Route::get('/settings', 'Owner\SettingController@index')->name('settings');
});