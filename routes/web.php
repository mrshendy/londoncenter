<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\website\coursesController;
//Auth::routes(['verify'=>true]);
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
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect()->route('home.index');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::group(['namespace' => 'home'], function () {
            Route::resource('home', 'homeController');
        });
        Route::group(['namespace' => 'website'], function () {
            Route::resource('about', 'aboutController');
            Route::resource('detailsCourse', 'detailsCourseController');
            Route::resource('services',      'servicesController');            
            Route::resource('contact',       'contactController');
            Route::resource('categories',    'categoriesController');
            Route::resource('courses',       'coursesController');
            Route::resource('seminars_and_conferences', 's_and_cController');
            Route::resource('join_request',  'requestsjoincontroller');
            Route::resource('gallery',       'galleryController');
            Route::get('/detailsCourse/{id}','detailsCourseController@show')->name('detailsCourse.show');
            Route::get('/detailss_and_c/{id}','detailss_and_cController@show')->name('detailss_and_c.show');
            Route::get('/courses/filter', [coursesController::class, 'show'])->name('courses.filter');
        });
        //     Route::get('/{page}', 'AdminController@index');
    },
);

//Auth::routes();
//Auth::routes(['register' => false]);