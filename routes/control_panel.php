<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Auth::routes(['verify'=>true]);
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
Route::group(['middleware'=>['guest']],function(){
    Route::get('login', function()
     {
         return view('auth.login');

     });
 });
 
 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','verified' ]
    ], function(){
     
        Route::group(['namespace'=>'Application_settings'],function()
        {
            Route::resource('settings_type','settings_typeController');
            // application_setting
            Route::resource('settings','application_settingsController');
            //currencies settings
            Route::resource('courses_settings', 'courses_settingsController');
            Route::get('/courses_settings/{id}','courses_settingsController@show')->name('courses_settings.show');
             //nationalities settings
            Route::resource('sections_settings', 'sections_settingsController');
            Route::resource('date_settings',     'date_settingsController');
            Route::resource('place_settings',    'place_settingsController');
            Route::resource('general_settings',  'generalsettingController');
            Route::resource('gallery_settings',  'gallery_settingsController');

            Route::resource('courses_details_settings', 'courses_details_settingsController');
            Route::get('/courses_details_settings/{id}','courses_details_settingsController@show')->name('courses_details_settings.show');
        });
      
        Route::group(['namespace'=>'dashbord'],function()
        {
            Route::resource('dashbord', 'dashbordController');
        });
           // Route::get('/{page}', 'AdminController@index');
         

         });
       

   
Auth::routes();
//Auth::routes(['register' => false]);