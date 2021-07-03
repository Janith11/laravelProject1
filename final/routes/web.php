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

use App\Role;
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
    Route::get('/addinstructor', 'Owner\IntructorsController@addinstructor')->name('addinstructor');
    Route::post('/addinstructor', 'Owner\IntructorsController@insertinstructor')->name('insertinstructor');
    Route::get('/editinstructor/{user_id}', 'Owner\IntructorsController@editinstructor')->name('editinstructor');
    Route::post('/updateinstructor/{user_id}', 'Owner\IntructorsController@updateinstructor')->name('updateinstructor');

    // students
    Route::get('/studentslist', 'Owner\StudentsController@index')->name('studentslist');
    Route::get('/addstudent', 'Owner\StudentsController@addstudent')->name('addstudent');
    Route::post('/addstudent', 'Owner\StudentsController@insertstudent')->name('insertstudent');
    Route::get('/editstudent/{user_id}', 'Owner\StudentsController@editstudent')->name('editstudent');
    Route::post('/updatestudent/{user_id}', 'Owner\StudentsController@updatestudent')->name('updatestudent');

    Route::get('/viewstudent/{user_id}', 'Owner\StudentsController@viewstudent')->name('viewstudent');

    //testing insert student route
    Route::get('/testinginsert', 'Owner\StudentsController@testinsertstudent')->name('testinsert');

    //testing insert student route
    Route::get('/testinginsert', 'Owner\StudentsController@testinsertstudent')->name('testinsert');


    Route::get('/payments', 'Owner\paymentsController@index')->name('payments');

    // sheduling part
    Route::get('/shedulelist', 'Owner\ShedulingController@index')->name('ownershedulelist');
    Route::get('/shedulelist/viewdetails/{id}', 'owner\ShedulingController@viewdetails')->name('viewdetails');
    Route::get('/shedulelist/calendar', 'owner\ShedulingController@addshedule')->name('calendar');
    Route::get('/addshedule/calendar/{date}', 'owner\ShedulingController@checkinput')->name('checkinput');
    Route::post('/addshedule/settime','owner\ShedulingController@setsheduletime')->name('setsheduletime');
    Route::post('/addshedule/saveshedule', 'Owner\ShedulingController@saveshedule')->name('saveshedule');
    Route::get('/allevents', 'Owner\ShedulingController@allevents')->name('allevents');
    Route::get('/shedulelist/postpond', 'owner\ShedulingController@postpond')->name('postpond');
    Route::get('/shedulelist/cancel/{id}', 'owner\ShedulingController@cancel')->name('cancel');
    Route::post('/shedulelist/cancel', 'owner\ShedulingController@updateascancel')->name('updateascancel');
    Route::get('shedulelist/todayshedules', 'owner\ShedulingController@todayshedules')->name('todayshedules');
    Route::get('shedulelist/allshedules', 'owner\ShedulingController@allshedules')->name('allshedules');
    Route::get('shedulelist/todayshedules/markascomplete/{id}', 'owner\ShedulingController@markascomplete')->name('markascomplete');
    Route::post('shedulelist/todayshedules/saveascomplete', 'owner\ShedulingController@saveascomplete')->name('saveascomplete');

    // session time table
    Route::get('/timetable', 'owner\TimeTableController@index')->name('timetable');
    Route::post('/timetable/addtimeslot', 'Owner\TimeTableController@inserttimeslot')->name('addtimeslot');
    Route::delete('/timetable/deleteslot/{id}', 'Owner\TimeTableController@deletetimeslot')->name('deletetimeslot');

    // vehicle part
    Route::get('/vehicles', 'Owner\VehicleController@index')->name('vehicles');
    Route::get('/addvehicles', 'Owner\VehicleController@addvehicle')->name('addvehicles');
    Route::post('/addvehicles', 'Owner\VehicleController@insertvehicle')->name('addvehicle');
    Route::get('/editvehicles/{id}', 'Owner\VehicleController@editvehicle')->name('editvehicle');
    Route::post('/updatevehicles/{id}', 'Owner\VehicleController@updatevehicle')->name('updatevehicle');
    Route::delete('/deletevehicles/{id}', 'Owner\VehicleController@deletevehicles')->name('deletevehicles');
    Route::post('/searchvehicle', 'Owner\VehicleController@searchvehicle')->name('searchvehicle');

    // vehicle category
    Route::get('/vehicle_category_list', 'owner\VehicleCategoryController@index')->name('vehiclecategory');
    Route::get('/vehicle_category_list/add_category', 'owner\VehicleCategoryController@add')->name('addvehiclecategory');
    Route::post('/vehicle_category_list/save_category', 'owner\VehicleCategoryController@savecategory')->name('savecategory');
    Route::get('/vehicle_category_list/edit_category/{id}','owner\VehicleCategoryController@editcategory')->name('editcategory');
    Route::post('/vehicle_category_list/update_category', 'owner\VehicleCategoryController@update_category')->name('updatecategory');
    Route::delete('/vehicle_category_list/delete_category/{id}', 'owner\VehicleCategoryController@delete_category')->name('deletecategory');

    // post
    Route::get('/post', 'owner\PostController@index')->name('allposts');
    Route::get('/post/createpost', 'owner\PostController@makeposts')->name('createpost');
    Route::post('/post/savepost', 'owner\PostController@savepost')->name('savepost');
    Route::delete('/post/deletepost/{id}', 'owner\PostController@deletepost')->name('deletepost');
    Route::get('/post/editpost/{id}', 'owner\PostController@editpost')->name('editpost');
    Route::post('/post/updatepost', 'owner\PostController@updatepost')->name('updatepost');

    //exam
    Route::get('/results','Owner\ExamController@index')->name('ownerexamresult');
    Route::get('/editresults/{id}','Owner\ExamController@edit')->name('editexamlist');
    Route::post('/editresults/save/{id}','Owner\ExamController@saveexamlist')->name('saveexamlist');
    Route::get('/addresults/{id}','Owner\ExamController@addresults')->name('addnewexamresult');

    // setting
    Route::get('/settings', 'Owner\SettingController@index')->name('settings');
    Route::post('/settings/savedetails', 'Owner\SettingController@savedetails')->name('savedetails');
    Route::post('/settings/saveopnehours', 'Owner\SettingController@saveopenhours')->name('saveopenhours');
    Route::post('/settings/savecompanylogo', 'Owner\SettingController@savelogo')->name('savelogo');
    Route::post('/settings/saveshedulingtype', 'Owner\SettingController@changeshedulingtype')->name('changeshedulingtype');


});

//Check and grouping all of the students
    Route::middleware('studentprofile')->group(function(){

        //examination results
        Route::get('/results','Student\ExamresultController@index')->name('studentresults');

    });
