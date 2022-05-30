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

Route::view('/','home');
Route::view('admin/index', 'admin.index');
Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');
Route::view('quickstart', 'quickstart');

//RM IF IT WORKS
Route::view('domain', 'user/domain');
//Route::get('domain', 'User\DomainController');
Route::post('domain', 'User\DomainController@setdomain');
Route::get('sftpinfo', 'User\SftpinfoController@index');
Route::get('domaininfo', 'User\DomaininfoController@index');

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');


    //NEED TO GET IT WORKING IN HERE
    //Route::get('domain', 'User\DomainController@show');
    //Route::post('domain', 'User\DomainController@setdomain');
    });






Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::redirect('/', '/admin/users');
    Route::resource('users', 'Admin\UserController');
    Route::get('users/{id}', 'Admin\UserController@show');
    Route::redirect('/', '/admin/domains');
    Route::resource('domains', 'Admin\DomainsystemController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
