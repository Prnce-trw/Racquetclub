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



Route::middleware(['reception:reception,cs,super,admin'])->group(function(){
  	route::get('/test-middleware-3','pong\AdminController@recept');
  	route::resource('manage-admin','pong\AdminController');
});
Route::middleware(['cs:cs,super,admin'])->group(function () {
	route::get('/test-middleware-2','pong\AdminController@cs');
});
Route::middleware(['super:super,admin'])->group(function () {
	route::get('/test-middleware-4','pong\AdminController@cs');
});
Route::middleware('admin')->group(function(){
	route::get('/test-middleware-1','pong\AdminController@admin');
});

//===================--------- Manage User -----------=========================//
route::resource('manage-user','pong\ManageUserController');
route::get('append-div/{id}','pong\ManageUserController@appendDiv');
route::get('search-div/{id}','pong\ManageUserController@appendSearch');
Route::get('/modal-upgrade','pong\ManageUserController@modalUpgrade');
Route::post('package-upgrade/{id}','pong\ManageUserController@upgradepack');
Route::get('modal-renewal','pong\ManageUserController@renewal');
Route::post('package-renewal/{id}','pong\ManageUserController@renewalpack');
Route::post('crop-image','pong\ManageUserController@crop');
route::get('search-edit/{id}','pong\ManageUserController@searchEdit');
Route::post('store-hold/{id}','pong\ManageUserController@storeHold');
route::get('checkdate-hold','pong\ManageUserController@checkHold');
Route::get('modal-hold','pong\ManageUserController@hold');
Route::get('search-renew','pong\ManageUserController@searchGroup');
Route::get('renewSearch-member','pong\ManageUserController@searchMember');
Route::post('filter-member','pong\ManageUserController@filter');

route::resource('member-card','pong\MemberCardController');
route::get('manage-user-pdf/{id}','pong\ManageUserController@printpdf');



// route::resource('manage-admin','pong\AdminController');
route::get('manage-admin-checkemail','pong\AdminController@checkemail');
route::get('login-user','pong\AdminController@login_ui');
route::post('login/admin','pong\AdminController@login');
route::post('update-permission','pong\AdminController@updatePermission');
route::post('block/{id}/{status}','pong\AdminController@block');

route::resource('manage-sport','pong\SportController');
route::get('select-package','pong\ManageUserController@selectPackage');


route::resource('managerepair','pong\RepairController');
route::get('createbuilding','pong\RepairController@showbdf');
route::post('createbuilding','pong\RepairController@createbuilding');
route::get('createbuilding','pong\RepairController@showbdf');
route::post('createbuilding','pong\RepairController@createbuilding');

route::resource('open-door','pong\DoorController');
Route::get('teacher-edit/{id}','teacherController@show');
Route::post('block-teacher/{id}/{status}','teacherController@block');
Route::post('delete-teacher/{id}','teacherController@destroy');

route::resource('daypass','pong\DaypassController');
Route::post('return-card/{id}','pong\DaypassController@cardReturn');

route::resource('manage-card','pong\CardController');
route::get('check-rfid/{id}/{type}','pong\CardController@check');