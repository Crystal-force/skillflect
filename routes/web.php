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

Route::get('/','LoginController@index');
Route::post('/skillhome', 'LoginController@Studend_Login');

Route::get('/studentpage',  'UserController@StudentPage');
Route::post('/skill_list', 'UserController@SelectedSkill');
Route::post('/send_data', 'UserController@SaveData');

Route::get('/profile', 'UserController@Profile');
Route::get('/all_data', 'UserController@AllData');
Route::post('/chart_alldata', 'UserController@AllChartData');
Route::post('/chart_selectdata','UserController@ChartSelectData');
Route::post('/totaldataview','UserController@TotalViewData');

Route::get('/thisweek', 'UserController@ThisWeek');
Route::post('/chart_weekdata', 'UserController@AllWeek');
Route::post('/week_selectdata', 'UserController@SelectWeek');



Route::get('/thismonth', 'UserController@ThisMonth');
Route::post('/chart_monthdata', 'UserController@AllMonth');
Route::post('/month_selectdata', 'UserController@SelectMonth');

Route::get('/classlist','UserController@ClassList');
Route::post('/tchclass','LoginController@ClassShow');
Route::get('/get_student/{id?}','UserController@StudentList' );
Route::get('/viewstudent', 'UserController@ViewStudent');
Route::post('/class_allchart','UserController@AllChartData');
Route::post('/class_selectalldata','UserController@ChartSelectData');
Route::get('/classweek', 'UserController@ViewWeek');
Route::post('/class_weekchart', 'UserController@AllWeek');
Route::post('/class_selectweekdata', 'UserController@SelectWeek');
Route::get('/classmonth','UserController@ViewMonth');
Route::post('/class_monthchart', 'UserController@AllMonth');
Route::post('/class_selectmonthdata', 'UserController@SelectMonth');


