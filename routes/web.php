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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/status', 'PaymentController@status')->name('status');



Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::delete('/unverify/{payment}', 'PaymentController@unverify')->name('unverify');
    Route::get('/verify/{payment}', 'PaymentController@verify')->name('verify');
    Route::delete('/unclaim/{payment}', 'PaymentController@unclaim')->name('unclaim');
    Route::get('/claim/{payment}', 'PaymentController@claim')->name('claim');
    Route::get('/unclaimed', 'HomeController@unclaimed')->name('unclaimed');
    Route::get('/unverified', 'HomeController@unverified')->name('unverified');
});

Route::resource('payments','PaymentController');


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::resource('departments','DepartmentController');
    Route::resource('courses','CourseController');
    Route::resource('semesters','SemesterController');
    Route::resource('years','YearController');
    Route::resource('periods','PeriodController');
    Route::resource('methods','MethodController');
});
