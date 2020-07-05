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

include 'routes-tai.php';
include 'routes-pong.php';
Route::get('/', function () {
	return redirect('login-user');
});
Route::get('/clc', function() {

	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
        // Artisan::call('view:clear');
        // session()->forget('key');
	return "Cleared!";

});
Auth::routes();

