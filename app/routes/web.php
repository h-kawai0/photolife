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

// TOP画面

use App\Http\Controllers\showPassEditController;

Route::get('/', function () {
    return view('action.index');
})->name('top');

// 写真詳細画面
Route::get('/detail', function() {
    return view('action.detail');
})->name('detail');


Route::group(['middleware' => 'auth'], function () {
    
    // マイページ関連
    Route::get('/mypage', 'ShowMypageController@showMypage')->name('showMypage');
    
    Route::get('/mypage/profile', 'ProfEditMypageController' )->name('profEdit');

    Route::put('/mypage', 'ProfUpdateMypageController')->name('profUpdate');


    Route::get('/mypage/password', 'showPassEditController')->name('passEdit');

    Route::put('/mypage', 'updatePassEditController')->name('passUpdate');
    
    
    Route::get('/photoedit', 'ShowPhotoEditController')->name('photoEdit');

    Route::post('/photoedit', 'CreatePhotoEditController')->name('createPhotoEdit');
    
    Route::post('/delete', 'UserDeleteController@userDelete')->name('userDelete');
    
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

