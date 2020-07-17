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

Route::get('/','UserController@index');
Route::get('/personal_summary','UserController@getPersonalSummary');
Route::post('/personal_summary/update','UserController@update');

Route::get('/experience','ExperienceController@index');
Route::get('/experience/delete/{id}','ExperienceController@delete');
Route::post('/experience/update','ExperienceController@update');
Route::post('/experience/add','ExperienceController@add');

Route::get('/education','EducationController@index');
Route::post('/education/update','EducationController@update');
Route::post('/education/add','EducationController@add');
Route::get('/education/delete/{id}','EducationController@delete');
Route::get('/awards','AwardController@index');
Route::get('/interests','InterestController@index');

Route::get('/skills','SkillController@index');
Route::post('/skills/add','SkillController@addSkill');
Route::get('/skills/delete/{id}','SkillController@deleteSkill');

Route::get('/abilities','AbilityController@index');
Route::post('/abilities/add','AbilityController@addAbility');
Route::post('/abilities/delete/{id}','AbilityController@deleteAbility');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 
Route::get('/logout', 'Auth\LoginController@logout');
