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

Route::get('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@index');
Route::post('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@register');
Route::get('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@index');
Route::post('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@register');
Route::get('/profilesearch', 'App\Http\Controllers\PatientProfileSummaryController@index');
Route::post('/profilesearch/report', 'App\Http\Controllers\PatientProfileSummaryController@search');
Route::get('/form/create', 'App\Http\Controllers\SurveyController@create');
Route::post('/form', 'App\Http\Controllers\SurveyController@store');
