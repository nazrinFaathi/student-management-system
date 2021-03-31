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

Route::get('/', array(
    'as' => 'students',
    'uses' => 'StudentController@index'
));

Route::get('/students/create', array(
    'as' => 'create-student',
    'uses' => 'StudentController@create'
));

Route::post('/students/store', array(
    'as' => 'store-student',
    'uses' => 'StudentController@store'
));

Route::get('/students/edit/{id}', array(
    'as' => 'edit-student',
    'uses' => 'StudentController@edit'
));

Route::put('/students/update/{id}', array(
    'as' => 'update-student',
    'uses' => 'StudentController@update'
));

Route::get('/students/delete/{id}', array(
    'as' => 'delete-student',
    'uses' => 'StudentController@destroy'
));

Route::get('/reports', array(
    'as' => 'reports',
    'uses' => 'ReportController@index'
));

Route::get('/reports/create', array(
    'as' => 'create-report',
    'uses' => 'ReportController@create'
));

Route::post('/reports/store', array(
    'as' => 'store-report',
    'uses' => 'ReportController@store'
));

Route::get('/reports/edit/{id}', array(
    'as' => 'edit-report',
    'uses' => 'ReportController@edit'
));

Route::put('/reports/update/{id}', array(
    'as' => 'update-report',
    'uses' => 'ReportController@update'
));

Route::get('/reports/delete/{id}', array(
    'as' => 'delete-report',
    'uses' => 'ReportController@destroy'
));
