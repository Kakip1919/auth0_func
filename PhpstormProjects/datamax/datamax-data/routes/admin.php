<?php
use Illuminate\Support\Facades\Route;


Route::get('/','CorpoController@index')->name('corpo.index')->middleware("auth");
Route::get('/corpo/detail/{corpo_id}','CorpoController@detail')->name('corpo.detail')->middleware("auth");
Route::post('/corpo/update/{corpo_id}','CorpoController@update')->name('corpo.update')->middleware("auth");
Route::post('/corpo/delete/{corpo_id}','CorpoController@delete')->name('corpo.delete')->middleware("auth");


Route::get("/manage/index", "ManageAdminController@index")->name("manage.index")->middleware("auth");
Route::get("/manage/create", "ManageAdminController@create")->name("manage.create")->middleware("auth");
Route::get("/manage/edit/{manage_id}", "ManageAdminController@edit")->name("manage.edit")->middleware("auth");
Route::post("/manage/store", "ManageAdminController@store")->name("manage.store")->middleware("auth");
Route::post("/manage/update/{manage_id}", "ManageAdminController@update")->name("manage.update")->middleware("auth");
Route::post("/manage/delete/{manage_id}", "ManageAdminController@delete")->name("manage.delete")->middleware("auth");





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
