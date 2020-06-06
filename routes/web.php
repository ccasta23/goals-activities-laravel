<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () { //Closure
    return view('test');
});


Route::get( '/home' , 'HomeController@index' );

Route::get('/dashboard', 'DashboardController@inicio');

Route::get('/testdb', 'DashboardController@testDB');

Route::resource('/goals', 'GoalsController')->middleware('auth');

Route::post('/goals/{goal}/sendEmail', 'GoalsController@sendEmail')->name('goals.sendEmail');

Route::resource('/goals/{goal}/activities', 'ActivityController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
