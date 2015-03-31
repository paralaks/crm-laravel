<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');


Route::any('/', 'HomeController@index');
Route::any('home', 'HomeController@index');

Route::resource('lead', 'LeadController');
Route::get('lead/{id}/editConvert', 'LeadController@editConvert');
Route::post('lead/{id}/convert', 'LeadController@convert');
Route::get('lead/{id}/editOwner', 'LeadController@editOwner');
Route::patch('lead/{id}/saveOwner', 'LeadController@saveOwner');


Route::resource('contact', 'ContactController');
Route::get('contact/{id}/editOwner', 'ContactController@editOwner');
Route::patch('contact/{id}/saveOwner', 'ContactController@saveOwner');


Route::get('account/showChangeAccount', 'AccountController@showChangeAccount');
Route::patch('account/searchChangeAccount', 'AccountController@searchChangeAccount');
Route::resource('account', 'AccountController');
Route::get('account/{id}/editOwner', 'AccountController@editOwner');
Route::patch('account/{id}/saveOwner', 'AccountController@saveOwner');


Route::resource('activity', 'ActivityController');


Route::resource('opportunity', 'OpportunityController');
Route::get('opportunity/{id}/editOwner', 'OpportunityController@editOwner');
Route::patch('opportunity/{id}/saveOwner', 'OpportunityController@saveOwner');


Route::resource('report', 'ReportController');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


