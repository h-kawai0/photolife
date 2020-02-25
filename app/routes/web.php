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

Route::get('/', function () {
    return view('action.index');
})->name('top');

Route::get('/detail', function() {
    return view('action.detail');
})->name('detail');

Route::get('/mypage', function() {
    return view('action.mypage');
})->name('mypage');

Route::get('/profedit', function () {
    return view('action.profEdit');
})->name('profEdit');

Route::get('/photoedit', function () {
    return view('action.photoEdit');
})->name('photoEdit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
