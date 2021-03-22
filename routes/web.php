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

Route::get('/', 'App\Http\Controllers\DashboardController@index');



Route::get('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@index');
Route::post('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@register');
Route::get('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@index');
Route::post('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@register');
Route::get('/profilesearch', 'App\Http\Controllers\PatientProfileSummaryController@index');
Route::post('/profilereport', 'App\Http\Controllers\PatientProfileSummaryController@search');
Route::get('/form/create', 'App\Http\Controllers\SurveyController@create');
Route::post('/form', 'App\Http\Controllers\SurveyController@store');
Route::get('/adminlogin', 'App\Http\Controllers\AdminLoginController@index');
Route::post('/adminloginpage', 'App\Http\Controllers\AdminLoginController@login');
Route::get('/patientlogin', 'App\Http\Controllers\PatientLoginController@index');
Route::post('/patientloginpage', 'App\Http\Controllers\PatientLoginController@login');
Route::get('/editSurvey/create', 'App\Http\Controllers\EditSurveyController@create');
Route::post('/editSurvey', 'App\Http\Controllers\EditSurveyController@store');
Route::delete('surveyquestions/{id}', 'App\Http\Controllers\EditSurveyController@destroy');
Route::post('/report', 'App\Http\Controllers\ReportController@store');
Route::get('/report/create', 'App\Http\Controllers\ReportController@create');
Route::post('/accept', 'App\Http\Controllers\AcceptanceController@store');
Route::get('/accept/create', 'App\Http\Controllers\AcceptanceController@create');
Route::post('/passwordreset', 'App\Http\Controllers\PasswordController@store');
Route::get('/passwordreset/create', 'App\Http\Controllers\PasswordController@create');
Route::get('/passwordchangepatient', 'App\Http\Controllers\PasswordController@patientchange');
Route::post('/passwordchangepatientsave', 'App\Http\Controllers\PasswordController@patientsave');
Route::get('/passwordchangeadmin', 'App\Http\Controllers\PasswordController@adminchange');
Route::post('/passwordchangeadminsave', 'App\Http\Controllers\PasswordController@adminsave');

Route::get('/logout', 'App\Http\Controllers\LogoutController@logout');


