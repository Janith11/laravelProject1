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

use App\Instructor;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

Route::get('/', function () {
    return view('welcome');
})->name('firstpage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contactus', 'landingpage\ContactusController@index')->name('contactus');
Route::get('/gallery', 'landingpage\GalleryControllere@index')->name('gallery');

//road signs
Route::get('/roadsigns', 'landingpage\RoadsignsController@index')->name('roadsigns');
Route::get('/roadsigns/DangerWarning', 'landingpage\RoadsignsController@dangerwarningsign')->name('dangerwarning');
Route::get('/roadsigns/Prohibitory-Signs', 'landingpage\RoadsignsController@prohibitorysigns')->name('prohibitorysigns');
Route::get('/roadsigns/Mandatory-Signs', 'landingpage\RoadsignsController@mandatorysigns')->name('mandatorysigns');
Route::get('/roadsigns/Priority-Signs', 'landingpage\RoadsignsController@prioritysigns')->name('prioritysigns');
Route::get('/roadsigns/Informative-Signs', 'landingpage\RoadsignsController@informativesigns')->name('informativesigns');
Route::get('/roadsigns/routenumbersign', 'landingpage\RoadsignsController@routenumbersign')->name('routenumbersign');
Route::get('/roadsigns/Traffic-Light-Signals', 'landingpage\RoadsignsController@trafficlightsignals')->name('trafficlightsignals');

Route::get('/prices', 'landingpage\PricesController@index')->name('prices');
Route::get('/rmvregulations', 'landingpage\RMVregulationsController@index')->name('rmvregulations');

//online paper
Route::get('/onlinepaper', 'landingpage\OnlinepaperController@index')->name('onlinepaper');
Route::get('/onlinepaper/paper01', 'landingpage\OnlinepaperController@paper1')->name('onlinepaperone');
Route::get('/onlinepaper/paper02', 'landingpage\OnlinepaperController@paper2')->name('onlinepapertwo');
Route::get('/onlinepaper/paper03', 'landingpage\OnlinepaperController@paper3')->name('onlinepaperthree');
Route::get('/onlinepaper/paper04', 'landingpage\OnlinepaperController@paper4')->name('onlinepaperfour');
Route::get('/onlinepaper/paper05', 'landingpage\OnlinepaperController@paper5')->name('onlinepaperfive');
Route::get('/onlinepaper/paper06', 'landingpage\OnlinepaperController@paper6')->name('onlinepapersix');
Route::get('/onlinepaper/paper07', 'landingpage\OnlinepaperController@paper7')->name('onlinepaperseven');
Route::get('/onlinepaper/paper08', 'landingpage\OnlinepaperController@paper8')->name('onlinepapereight');
Route::get('/onlinepaper/paper09', 'landingpage\OnlinepaperController@paper9')->name('onlinepapernine');
Route::get('/onlinepaper/paper10', 'landingpage\OnlinepaperController@paper10')->name('onlinepaperten');

Route::get('/services','landingpage\ServicesCotroller@index')->name('services');

//contactus landing page
Route::post('/contactus/messages','landingpage\ContactusController@insert')->name('contactusmessage');

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


// create route group with middleware
Route::middleware('checkrequest')->group(function(){

    //instructors
    Route::get('/instructors', 'Owner\IntructorsController@index')->name('instructors');
    Route::get('/addinstructor', 'Owner\IntructorsController@addinstructor')->name('addinstructor');
    Route::post('/addinstructor', 'Owner\IntructorsController@insertinstructor')->name('insertinstructor');
    Route::get('/editinstructor/{user_id}', 'Owner\IntructorsController@editinstructor')->name('editinstructor');
    Route::post('/updateinstructor/{user_id}', 'Owner\IntructorsController@updateinstructor')->name('updateinstructor');
    Route::get('/updateinstructor/categoryview/{id}','Owner\IntructorsController@viewcategory')->name('instructorcategorypage');
    Route::post('/updateinstructor/categoryview/newcategory','Owner\IntructorsController@addnewcategory')->name('addnewinstructorcategory');
    Route::post('/updateinstructor/categoryview/updatecategory/{id}/{userid}','Owner\IntructorsController@updatecategory')->name('updateinstructorcategory');
    Route::delete('/updateinstructor/categoryview/deletecategory/{id}/{userid}', 'Owner\IntructorsController@deleteecategory')->name('deleteinstructorvehiclecategory');
    Route::post('/instructors/removeinstructor/{id}', 'Owner\IntructorsController@removeinstructor')->name('removeinstructor');
    Route::get('instructors/Deleted','Owner\IntructorsController@viewremovedinstructors')->name('viewremovedinstructors');
    Route::post('instructors/Restore/{id}','Owner\IntructorsController@restoreinstructor')->name('restoreinstructor');

    // students
    Route::get('/studentslist', 'Owner\StudentsController@index')->name('studentslist');
    Route::get('/addstudent', 'Owner\StudentsController@addstudent')->name('addstudent');
    Route::post('/addstudent', 'Owner\StudentsController@insertstudent')->name('insertstudent');
    Route::get('/viewstudent/{user_id}', 'Owner\StudentsController@viewstudent')->name('viewstudent');
    Route::get('/editstudent/{user_id}', 'Owner\StudentsController@editstudent')->name('editstudent');
    Route::post('/updatestudent/{user_id}', 'Owner\StudentsController@updatestudent')->name('updatestudent');
    Route::get('/editstudentcategory/{id}', 'Owner\StudentsController@viewcategory')->name('categoryview');
    Route::get('/students/completedstudents', 'Owner\StudentsController@completedstudent')->name('completedstudents');
    Route::post('/students/completedstudents/temporydelete/{id}', 'Owner\StudentsController@temporydelete')->name('temporystudentdelete');
    Route::get('/students/completedstudents/recyclebin', 'Owner\StudentsController@viewrecycle')->name('viewstudentrecyclebin');
    Route::post('/students/completedstudents/restorestudent/{id}', 'Owner\StudentsController@restorestudent')->name('restorestudent');

    //student category part update and add category in the studentcontroller
    Route::post('/updatecategory/test/{id}/{userid}', 'Owner\StudentsController@updatecategory')->name('updatestudentcategory');
    Route::delete('/deletestudentcategory/{id}/{userid}', 'Owner\StudentsController@deleteecategory')->name('deletestudentvehiclecategory');
    Route::post('/updatecategory/addnewcategory','Owner\StudentsController@addnewcategory')->name('addnewstudentcategory');

    //testing insert student route
    Route::get('/testinginsert', 'Owner\StudentsController@testinsertstudent')->name('testinsert');

    //testing insert student route
    Route::get('/testinginsert', 'Owner\StudentsController@testinsertstudent')->name('testinsert');

    //payments
    Route::get('/payments', 'Owner\paymentsController@index')->name('payments');//view payments list with students page
    Route::get('/payments/pay/{id}','Owner\paymentsController@studentpayments')->name('studentpayments');
    Route::post('/payments/pay/processing','Owner\paymentsController@insertpayment')->name('paystudentpatment');

    // sheduling part
    Route::get('/shedulelist', 'Owner\ShedulingController@index')->name('ownershedulelist');
    Route::get('/shedulelist/viewdetails/{id}', 'owner\ShedulingController@viewdetails')->name('viewdetails');
    Route::get('/shedulelist/calendar', 'owner\ShedulingController@addschedule')->name('calendar');

    // my start
    Route::get('/addshedule/calendar/{date}', 'Owner\ShedulingController@checkinputdate')->name('checkinputdate');
    Route::post('/addshedule/calender/check', 'Owner\ShedulingController@checkinputtimeslot')->name('checkinputtimeslot');
    Route::post('/addshedule/calender/save', 'Owner\ShedulingController@createschedule')->name('savecreateshedule');
    Route::get('/addshedule/calender/updateschedule/{id}/{date}', 'Owner\ShedulingController@reupdateshedule')->name('updateexistschedule');
    Route::post('/addshedule/calender/saveupdateschedule', 'Owner\ShedulingController@saveupdateschedule')->name('saveupdateschedule');
    // my end

    Route::get('/allevents', 'Owner\ShedulingController@allevents')->name('allevents');
    Route::get('/shedulelist/postpond', 'owner\ShedulingController@postpond')->name('postpond');
    Route::get('/shedulelist/cancel/{id}', 'owner\ShedulingController@cancel')->name('cancelshedule');
    Route::post('/shedulelist/cancel', 'owner\ShedulingController@updateascancel')->name('updateascancel');
    Route::get('shedulelist/todayshedules', 'owner\ShedulingController@todayshedules')->name('todayshedules');
    Route::get('shedulelist/allshedules', 'owner\ShedulingController@allshedules')->name('allshedules');
    Route::get('shedulelist/todayshedules/markascomplete/{id}', 'Owner\ShedulingController@markascomplete')->name('markascomplete');
    Route::post('shedulelist/todayshedules/saveascomplete', 'Owner\ShedulingController@saveascomplete')->name('saveascomplete');

    // session time table
    Route::get('/timetable', 'Owner\TimeTableController@index')->name('timetable');
    Route::post('/timetable/addtimeslot', 'Owner\TimeTableController@inserttimeslot')->name('addtimeslot');
    Route::delete('/timetable/deleteslot/{id}', 'Owner\TimeTableController@deletetimeslot')->name('deletetimeslot');
    Route::get('/timetable/loadinstructor/{ins}/{trans}', 'Owner\TimeTableController@loadinstructors')->name('timetableloadinstructors');

    // vehicle part
    Route::get('/vehicles', 'Owner\VehicleController@index')->name('vehicles');
    Route::get('/addvehicles', 'Owner\VehicleController@addvehicle')->name('addvehicles');
    Route::post('/addvehicles', 'Owner\VehicleController@insertvehicle')->name('addvehicle');
    Route::get('/editvehicles/{id}', 'Owner\VehicleController@editvehicle')->name('editvehicle');
    Route::post('/updatevehicles/{id}', 'Owner\VehicleController@updatevehicle')->name('updatevehicle');
    Route::delete('/deletevehicles/{id}', 'Owner\VehicleController@deletevehicles')->name('deletevehicles');
    Route::post('/searchvehicle', 'Owner\VehicleController@searchvehicle')->name('searchvehicle');

    // vehicle category
    Route::get('/vehicle_category_list', 'Owner\VehicleCategoryController@index')->name('vehiclecategory');
    Route::get('/vehicle_category_list/add_category', 'Owner\VehicleCategoryController@add')->name('addvehiclecategory');
    Route::post('/vehicle_category_list/save_category', 'Owner\VehicleCategoryController@savecategory')->name('savecategory');
    Route::get('/vehicle_category_list/edit_category/{id}','Owner\VehicleCategoryController@editcategory')->name('editcategory');
    Route::post('/vehicle_category_list/update_category/{id}', 'Owner\VehicleCategoryController@update_category')->name('updatecategory');
    Route::delete('/vehicle_category_list/delete_category/{id}', 'Owner\VehicleCategoryController@delete_category')->name('deletecategory');

    // post
    Route::get('/post', 'Owner\PostController@index')->name('allposts');
    Route::get('/post/createpost', 'Owner\PostController@makeposts')->name('createpost');
    Route::post('/post/savepost', 'Owner\PostController@savepost')->name('savepost');
    Route::delete('/post/deletepost/{id}', 'Owner\PostController@deletepost')->name('deletepost');
    Route::get('/post/editpost/{id}', 'Owner\PostController@editpost')->name('editpost');
    Route::post('/post/updatepost', 'Owner\PostController@updatepost')->name('updatepost');

    //exam
    Route::get('/resultstest','Owner\ExamController@index')->name('ownerexamresult');
    Route::get('/editresults/{id}','Owner\ExamController@edit')->name('editexamlist');
    Route::post('/editresults/save/{id}','Owner\ExamController@saveexamlist')->name('saveexamlist');
    Route::get('/addresults/{id}','Owner\ExamController@addresults')->name('addnewexamresult');
    Route::post('/addresults','Owner\ExamController@saveresults')->name('saveresults');
    Route::post('/exam/Set_Exam_Date','Owner\ExamController@setexamdate')->name('setexamdate');

    // setting
    Route::get('/settings', 'Owner\SettingController@index')->name('settings');
    Route::post('/settings/savedetails', 'Owner\SettingController@savedetails')->name('savedetails');
    Route::post('/settings/saveopnehours', 'Owner\SettingController@saveopenhours')->name('saveopenhours');
    Route::post('/settings/savecompanylogo', 'Owner\SettingController@savelogo')->name('savelogo');
    Route::post('/settings/saveshedulingtype', 'Owner\SettingController@changeshedulingtype')->name('changeshedulingtype');
    Route::post('/settings/savesprofile', 'Owner\SettingController@saveprofiledetails')->name('saveprofiledetails');
    Route::post('/settings/savesprofileimage', 'Owner\SettingController@updateprofilepicture')->name('updateownerprofileimage');
    Route::get('/settings/password', 'Owner\SettingController@password')->name('ownerpassword');
    Route::post('/settings/password/save', 'Owner\SettingController@store')->name('saveownerpassword');

    // attendances
    Route::get('/attendanceslist', 'Owner\EmplooyeeAttendanceController@index')->name('attendanceslist');
    Route::get('/attendanceslist/todayattendance', 'Owner\EmplooyeeAttendanceController@todayattendance')->name('todayattendance');
    Route::post('/attendanceslist/checkin', 'Owner\EmplooyeeAttendanceController@savecheckin')->name('savecheckin');
    Route::post('/attendanceslist/checkout', 'Owner\EmplooyeeAttendanceController@savecheckout')->name('savecheckout');
    Route::post('/attendanceslist/absent', 'Owner\EmplooyeeAttendanceController@saveabsent')->name('saveabsent');
    Route::get('/attendanceslist/attendancedetails/{id}', 'Owner\EmplooyeeAttendanceController@attendancedetails')->name('attendancedetails');
    Route::get('/attendanceslist/attendancedetails/calender/{id}', 'Owner\EmplooyeeAttendanceController@instructorattendancedetails')->name('instructorattendancedetails');
    Route::get('/attendanceslist/unmarkedattendance', 'Owner\EmplooyeeAttendanceController@unmarkedattendance')->name('unmarkedattendance');
    Route::post('/attendanceslist/unmarkedattendance/save', 'Owner\EmplooyeeAttendanceController@saveunmarkedattend')->name('saveunmarkedattendance');

    //employee leaves
    Route::get('/leaverequest', 'Owner\LeaveController@leaverequest')->name('leaverequest');
    Route::post('/leaverequest/accept', 'Owner\LeaveController@acceptrequest')->name('acceptleaverequest');
    Route::post('/leaverequest/ignore', 'Owner\LeaveController@ignorerequest')->name('ignorerequest');
    Route::get('/leavedetails/{id}', 'Owner\LeaveController@levaedetails')->name('leavedetails');

    // owner chat
    Route::get('/owner/chat', 'Owner\ChatController@index')->name('ownerchat');
    Route::get('/contacts', 'Owner\ChatController@get');
    Route::get('/conversation/{id}', 'Owner\ChatController@getMessagesFor');
    Route::post('/conversation/send', 'Owner\ChatController@send');

    //requests
    Route::get('/viewrequist', 'Owner\ViewrequestController@index')->name('viewrequest');
    Route::get('/reviewrequest/{id}', 'Owner\ViewrequestController@get')->name('reviewrequest');
    Route::post('/acceptrequest/{id}', 'Owner\ViewrequestController@accept')->name('acceptrequest');
    Route::post('/declinerequest/{id}', 'Owner\ViewrequestController@decline')->name('declinerequest');
    Route::get('/requests/view/declinerequests','Owner\ViewrequestController@viewdeleterequests')->name('viewdeleterequests');
    Route::post('/declinerequest/restore/{id}', 'Owner\ViewrequestController@restorerequest')->name('restorestudentrequests');
    Route::delete('/declinerequest/delete/{id}', 'Owner\ViewrequestController@deleterequest')->name('deletestudentrequests');

    // payroll
    Route::get('/saray', 'Owner\SalaryController@index')->name('salary');
    Route::get('/salary/calculatesalary/{id}', 'Owner\SalaryController@calculatesalary')->name('calculatesalary');
    Route::post('/salary/calculatesalary/save', 'Owner\SalaryController@savesalary')->name('savesalary');
    Route::post('/salary/addexpense', 'Owner\ExpenseController@makeexpense')->name('addexpense');
    Route::get('/salary/history', 'Owner\SalaryController@history')->name('payrollhistory');

    //RequestAlert
    Route::get('requestalert','Owner\RequestAlertController@index')->name('viewalert');
    Route::get('requestalert/viewalerts/{userid}/{description}/{id}','Owner\RequestAlertController@redirect')->name('loadrequestalerts');
    Route::get('/requestdetails/{date}/{id}/{user_id}', 'Owner\RequestAlertController@requestdetails')->name('shedulerequestdetails');
    Route::post('/requestdetails/accept', 'Owner\RequestAlertController@accept')->name('acceptshedulerequest');
    Route::post('/requestdetails/ignore', 'Owner\RequestAlertController@ignore')->name('ignoreshedulerequest');
    // Route::get('requestalert/accepetrequest/{id}','Owner\RequestAlertController@acceptschedule')->name('studentschedulerequestaccepet');

});

//Check and grouping all of the students :: student dashboard
Route::middleware('studentprofile')->group(function(){

    //examination results
    Route::get('/results','Student\ExamresultController@index')->name('studentresults');

    // Student chats
    Route::get('/Schat', 'Student\ChatController@index')->name('studentchat');
    Route::get('/contactsS', 'Student\ChatController@get');
    Route::get('/conversationS/{id}', 'Student\ChatController@getMessagesFor');
    Route::post('/conversationS/send', 'Student\ChatController@send');

    //students profile
    Route::get('/studentprofile', 'Student\StudentProfileController@index')->name('studentprofile');
    Route::post('/studentprofile/update', 'Student\StudentProfileController@updateprofile')->name('updatestudentprofile');
    Route::post('/studentprofile/updateprofileimage', 'Student\StudentProfileController@updateprofilepicture')->name('studentupdateprofilepicture');
    Route::get('/studentprofile/changepassword', 'Student\StudentProfileController@changepassword')->name('studentchangepassword');
    Route::post('/studentprofile/changepassword/save', 'Student\StudentProfileController@store')->name('studentupdatepassword');

    // sheduling part
    Route::get('/studentshedule', 'Student\ShedulingController@index')->name('studentsheduling');
    Route::get('/allstudentshedules/{id}', 'Student\ShedulingController@events')->name('studentallshedules');
    Route::get('/studentshedule/getdate/{date}', 'Student\ShedulingController@checkdate')->name('checkdate');
    Route::post('/studentshedule/getdate/requestslot', 'Student\ShedulingController@requestslot')->name('studentrequestslot');
    Route::get('/studentshedule/completedshedules', 'Student\ShedulingController@completedshedules')->name('studentcompletedshedules');
    Route::get('/studentshedule/pendingrequests', 'Student\ShedulingController@pendingrequest')->name('studentpendingrequests');
    Route::get('/stuedntshedule/expandsessions', 'Student\ShedulingController@expandrequest')->name('expandrequests');
    Route::post('/studentshedule/requestmore', 'Student\ShedulingController@requestmore')->name('requestmore');
    Route::get('/studentshedule/history', 'Student\ShedulingController@history')->name('history');
    Route::delete('/studentshedule/delete/{id}', 'Student\ShedulingController@deleterequests')->name('deleterequests');
    Route::get('/studentshedule/rejected', 'Student\ShedulingController@rejected')->name('rejectedshedules');

    // comment
    Route::get('/comments', 'Student\CommentController@index')->name('studentcomment');
    Route::post('/comments/save', 'Student\CommentController@savecomment')->name('savecomment');

    // alerts
    Route::get('/alerts', 'Student\AlertController@index')->name('studentalerts');
    Route::post('/alerts/read', 'Student\AlertController@read')->name('studentmarkasread');

    //payments
    Route::get('/student/payments', 'Student\PaymentController@index')->name('studenentpaymentlogsview');

    // instructors
    Route::get('/instructorsdetails', 'Student\InstructorController@index')->name('studentinstructorsdetails');
    Route::get('/instructordetails/{id}', 'Student\InstructorController@insprofile')->name('studentinstructordetails');

});


//instructor dashboad
Route::middleware('instructordashboard')->group(function(){

    //allevents
    Route::post('/instructorallevents', 'Instructor\InstructorDashboadController@instructorallevents')->name('instructorallevents');

    //shedules
    Route::get('/sheduledetails/{id}', "Instructor\ShedulingController@todaysheduledetails")->name('instructortodayshedulesdetails');
    Route::get('/reportattendance/{id}', 'Instructor\ShedulingController@reportattendance')->name('reportattendance');
    Route::post('/informattendance', 'Instructor\ShedulingController@saveattendance')->name('informattendance');
    Route::get('/sheduleslist', 'Instructor\ShedulingController@shedulepage')->name('instructorshedulelist');
    Route::get('/sheduleslist/lastthirydays', 'Instructor\ShedulingController@lastthirtydays')->name('lastthirydays');
    Route::get('/sheduleslist/lastsixmonth', 'Instructor\ShedulingController@lastsixmonth')->name('lastsixmonth');
    Route::get('/sheduleslist/lastyear', 'Instructor\ShedulingController@lastyear')->name('lastyear');
    Route::get('/sheduleslist/allshedules', 'Instructor\ShedulingController@allshedules')->name('instructorallshedules');
    Route::get('/sheduleslist/calendar', 'Instructor\ShedulingController@calendar')->name('instructorcalendar');
    Route::get('/sheduleslist/calendarevents', 'Instructor\ShedulingController@calendarevents')->name('instructorcalendarevents');

    // posts
    Route::get('/posts', 'Instructor\PostsController@index')->name('instructorpostlist');
    Route::get('/posts/createpost', 'Instructor\PostsController@createposts')->name('instructorcreatepost');
    Route::get('/posts/editpost/{id}/{user_id}', 'Instructor\PostsController@editposts')->name('instructoreditpost');
    Route::delete('/posts/deletepost/{id}/{user_id}', 'Instructor\PostsController@deletepost')->name('instructordeletepost');
    Route::post('/posts/savepost', 'Instructor\PostsController@savepost')->name('instructorsavepost');
    Route::post('/posts/updatepost', 'Instructor\PostsController@updatepost')->name('instructorupdatepost');

    // students
    Route::get('/studentslists', 'Instructor\StudentController@index')->name('instructorstudentslist');
    Route::get('/studentslists/details/{id}', 'Instructor\StudentController@details')->name('instructorstudentsdetails');

    //instructor profile
    Route::get('/instructorprofile', 'Instructor\ProfileController@index')->name('instructorprofile');
    Route::post('/instructorprofile/update', 'Instructor\ProfileController@updateprofile')->name('updateinstructorprofile');
    Route::post('/instructorprofile/updateprofileimage', 'Instructor\ProfileController@updateprofilepicture')->name('instructorupdateprofilepicture');
    Route::get('/instructorprofile/changepassword', 'Instructor\ChangePasswordController@index')->name('instructorchangepassword');
    Route::post('/instructorprofile/updatepassword', 'Instructor\ChangePasswordController@store')->name('updateinstructorpassword');

    //Chat
    Route::get('/Ichat', 'Instructor\ChatController@index')->name('instructorchat');
    Route::get('/contactsI', 'Instructor\ChatController@get');
    Route::get('/conversationI/{id}', 'Instructor\ChatController@getMessagesFor');
    Route::post('/conversationI/send', 'Instructor\ChatController@send');

    // attendances
    Route::get('/instructorattendancelist', 'Instructor\AttendanceController@index')->name('instructorattendancelist');
    Route::get('/leaverequestdetails', 'instructor\LeaveController@request')->name('instructorleaverequestdetails');
    Route::post('/requestleave', 'instructor\LeaveController@requestleave')->name('requestleave');
    Route::get('/pendingrequests', 'instructor\LeaveController@pendingrequestdetails')->name('instructorpendingrequests');
    Route::get('/leaverequestdetails/month', 'Instructor\AttendanceController@month');
    Route::delete('/cancel/{id}', 'instructor\LeaveController@cancelrequest')->name('cancel');
    Route::get('/instructorattendance', 'Instructor\AttendanceController@calendar')->name('instructorattendancecalendar');
    Route::get('/instructorattendancelist/monthleavedetails', 'instructor\LeaveController@leavedetails')->name('monthleavedetails');
    Route::get('/instructorattendancelist/monthleavedetails/all', 'instructor\LeaveController@allleavedetails')->name('instructorallleavedetails');

    //payroll
    Route::get('/instructorsalary', 'Instructor\SalaryController@index')->name('instructorsalary');

    //alerts
    Route::get('/instructoralert', 'Instructor\AlertController@index')->name('instrcutoralerts');
    Route::post('/instructoralert/read', 'Instructor\AlertController@read')->name('markinstrcutoralerts');
});


//candidate middleware
Route::group(['as' => 'candidate.', 'prefix' => 'candidate', 'namespace' => 'candidate', 'middleware' => ['auth', 'candidate']],
    function(){
        Route::get('dashboard', 'CandidateController@index')->name('candidatedashboard');
    }
);
