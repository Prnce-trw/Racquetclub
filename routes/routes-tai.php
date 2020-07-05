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

// reception 3
Route::middleware(['reception:reception,cs,super,admin'])->group(function(){
    Route::get('schedule/{id}', 'EventController@eventindex');
});

//Admin-sport 2
Route::middleware(['cs:cs,super,admin'])->group(function () {
  
});

// Admin-cs 4
Route::middleware(['super:super,admin'])->group(function () {
  
});

// Power admin 1
Route::middleware('admin')->group(function(){
    
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-user', function () {
    return view('backend.user.register');

});

Route::get('/index', function () {
    return view('backend.user.index');

});

Route::get('/groupsregister', function () {
    return view('backend.user.groupsregister');

});

Route::get('/admin', function () {
    return view('backend.admin.index');

});

Route::get('/create', function () {
    return view('backend.admin.create');

});

Route::get('/permission', function () {
    return view('backend.admin.permission');

});

Route::get('/setpermission', function () {
    return view('backend.admin.setpermission');

});

/// createteacher


Route::get('/index', function () {
    return view('backend.jobrepair.index');

});

Route::get('/worksheet', function () {
    return view('backend.jobrepair.worksheet');

});

Route::get('/manageworksheet', function () {
    return view('backend.jobrepair.manageworksheet');

});

Route::get('/viewworksheet', function () {
    return view('backend.jobrepair.viewworksheet');

});



Route::get('/backend/user', 'userController@user')->name('backoffice');
Route::post('/user/create/', 'userController@create');
Route::get('/showprofile/{memberID}','userController@showprofile');
Route::get('/updateprofile', 'userController@updateprofile');
Route::post('/updateprofile', 'userController@updateprofile');
Route::get('/report', 'PDFController@pdf');

/////// การจัดการ แพ็คเกจ  ////
Route::get('/backend/managepackage', 'packageController@managepackage')->name('managepackage');
Route::post('/managepackage/create/', 'packageController@create');
Route::get('/editpackage/{id}', 'packageController@edit');



Route::post('/delpackage', 'packageController@del');
Route::get('/managepackage/create/','packageController@createform')->name('managepackage.create');

/////// การจัดการ คลาส  ////
Route::get('/backend/manageclass', 'manageclassController@manageclass')->name('manageclass');

Route::post('/manageclass/create/', 'manageclassController@create');

Route::get('/manageclass/create/','manageclassController@createform')->name('manageclass.create');
Route::get('/editclass/{id}', 'manageclassController@edit');

Route::post('/updateclass', 'manageclassController@updateclass');
Route::post('/delclass', 'manageclassController@del');

/////// การจัดการ teacher /////

Route::get('/backend/teacher/', 'teacherController@teacher')->name('teacher');
Route::post('/teacher/create/', 'teacherController@create');

Route::get('/teacher/create/', 'teacherController@teacherform')->name('teacher.create');

//////// แบดมินตัน/////


Route::get('/backend/badminton/', 'badmintonController@badminton')->name('badminton');

//////// เทนนิส//////

Route::get('/backend/tennis/', 'tennisController@tennis')->name('tennis');

////// meetting ////

Route::get('/backend/meetting/', 'meettingController@meetting')->name('meetting');

////// racquetball ////

Route::get('/backend/racquetball/', 'racquetballController@racquetball')->name('racquetball');

////// snooker ////

Route::get('/backend/snooker/', 'snookerController@snooker')->name('snooker');

///// export PDF
Route::get('/backend/user/report_test', 'PDFController@pdfinformation')->name('report_test');
Route::get('/backend/user/report_test/{memberID}', 'PDFController@pdfinformation');

///// export PDF ฟอร์มกรอก

Route::get('/backend/user/report', 'PDFController@pdf')->name('report');

// Prince
// Member PDF
Route::get('member_pdf/{id}', 'PDFController@member_pdf');

// ajax โชว์ class
Route::get('showclass/{id}', 'manageclassController@showclass');
// Delete class
route::post('delclass/{id}','manageclassController@delclass');
// modal buy class
Route::get('buyclass/{id}', 'manageclassController@buyclass');
// store buyclass
Route::post('createbuyclass', 'manageclassController@createbuyclass');
// ajax โชว์ member ซื้อ class
Route::get('showmemberinfo/{id}', 'manageclassController@showmemberinfo');
// info member buyclass
Route::get('infomember_buyclass/{id}', 'manageclassController@infomember_buyclass');
// delete member buyclass
Route::post('delmemberbuyclass/{id}', 'manageclassController@delmemberbuyclass');
// edit member buyclass
Route::get('editmemberinfo/{id}', 'manageclassController@editmemberinfo');
// update member buyclass
Route::post('/updatememberbuyclass/{id}', 'manageclassController@updatememberbuyclass');

// ajax โชว์ sport
route::get('showsport','pong\SportController@showsport');

// Delete Package
route::post('delpackage/{id}','packageController@delpackage');
// insert package
Route::post('/managepackage/create/', 'packageController@create');
// show package
Route::get('showpackage', 'packageController@showpackage');
// update package
Route::post('/updatepackage/{id}', 'packageController@updatepackage');

// create sport
Route::resource('createsport', 'CreatesportController');
Route::get('editsport', 'CreatesportController@editsport');

// Event

Route::get('schedule-cus/{id}', 'EventController@eventindexcus');
Route::resource('event', 'EventController');
Route::get('create_event', 'EventController@create_event');
Route::post('booking/create/', 'EventController@bookingcreate');
Route::get('create_edit', 'EventController@create_edit');
Route::post('booking/update/{id}', 'EventController@bookingupdate');
Route::get('selectdate', 'EventController@selectdate');
Route::get('court_info', 'EventController@court_info');
route::post('delevent/{id}','EventController@delevent');
// ajax โชว์ข้อมูล member ตอนจอง
Route::get('showmember', 'EventController@showmember');
// ajax ค้นหา id class
Route::get('searchclass', 'EventController@searchclass');

// report
Route::resource('backend/report', 'ReportController');
Route::get('search', 'ReportController@search');
Route::get('backend/reportmember', 'ReportController@reportmember');
Route::get('backend/reportteacher', 'ReportController@reportteacher');
Route::get('backend/reportadmin', 'ReportController@reportadmin');
Route::get('backend/reportsport', 'ReportController@reportsport');
Route::get('backend/reportclass', 'ReportController@reportclass');
Route::get('backend/reportpackage', 'ReportController@reportpackage');
Route::get('backend/reportbooking', 'ReportController@reportbooking');
Route::get('backend/reportbuyclass', 'ReportController@reportbuyclass');

// search
Route::resource('searchby', 'SearchController');
Route::get('sendvalue','SearchController@sendvalue');

// export member
Route::get('exportmember', 'ReportController@exportmember');
Route::get('filter-user', 'ReportController@filteruser');
// export teacher
Route::get('exportteacher', 'ReportController@exportteacher');
// export teacher
Route::get('exportadmin', 'ReportController@exportadmin');
// export teacher
Route::get('exportsport', 'ReportController@exportsport');
// export class
Route::get('exportclass', 'ReportController@exportclass');
// export package
Route::get('exportpackage', 'ReportController@exportpackage');
// export booking
Route::get('exportbooking', 'ReportController@exportbooking');
// filter court
Route::get('filterCourt', 'ReportController@filterCourt');
// filter booking
Route::get('filterBooking', 'ReportController@filterBooking');
// export buyclass
Route::get('exportbuyclass', 'ReportController@exportbuyclass');