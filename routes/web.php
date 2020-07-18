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

Route::get('/','mainController@index')->name('index');


Route::group(['prefix'=>'user'], function(){
    Route::post('/login','loginController@login')->name('login');
    Route::post('/register','loginController@register')->name('register');
    Route::get('/admin','dashboardController@index')->name('admin');
    Route::get('/signOut','loginController@signOut')->name('signOut');
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/show-all-jobs','dashboardController@jobs')->name('jobs');
    Route::post('/create-new-job','dashboardController@createNewJob')->name('createJob');
    Route::post('/update-status-job','dashboardController@publishJob')->name('publishJob');
    Route::get('/show-job-submit','dashboardController@showJobSubmit')->name('show-job-submit');
    Route::post('/show-job-submited','dashboardController@showJobSubmited')->name('show-job-submited');
});

Route::group(['prefix'=>'freelance'], function(){
    Route::get('/show-job-list','freelanceController@showJobList')->name('freelance-jobs');
    Route::post('/job-submit','freelanceController@jobSubmit')->name('job-submit');
    Route::post('/complete-profile','freelanceController@completeProfile')->name('complete-profile');
});