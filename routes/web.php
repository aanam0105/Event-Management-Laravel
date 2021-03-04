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
    return view('index');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/contactus', function () {
    return view('contact-us');
});
Route::get('/aboutus', function () {
    return view('about-us');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/services', function () {
    return view('service-page');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'EventsController@index')->name('index');

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'EventsController@index')->name('index');
    Route::get('/events/all','EventsController@allEvents')->name('events.all');
    Route::get('/user/all','EventsController@alluser')->name('events.alluser');
    Route::get('/events/enrollments/{event}','EventsController@enrollments')->name('events.enrollments');
    Route::delete('/user/{user}','EventsController@destroyuser')->name('events.destroyuser');
    Route::post('/user/role/{role}','EventsController@roles')->name('events.roles');
    Route::resource('events','EventsController');
    Route::resource('enrolls','EnrollController');
});
