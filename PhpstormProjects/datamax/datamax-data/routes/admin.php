<?php
use Illuminate\Support\Facades\Route;


Route::get('/','CorpoController@index')->name('corpo.index');
Route::get('/detail/{corpo_id}','CorpoController@detail')->name('corpo.detail');
Route::post('/update/{corpo_id}','CorpoController@update')->name('corpo.update');
Route::post('/delete/{corpo_id}','CorpoController@delete')->name('corpo.delete');
