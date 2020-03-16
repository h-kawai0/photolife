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


Route::get('/', 'IndexController')->name('top');

// 写真詳細画面
Route::get('/detail/{id}', 'ShowDetailController')->name('detail');


Route::group(['middleware' => 'auth'], function () {
    
    // ====================
    // マイページ関連
    // ====================

    // --------------------
    // マイページ
    // --------------------
    Route::get('/mypage', 'ShowMypageController@showMypage')->name('showMypage');
    
    // --------------------
    // プロフィール編集
    // --------------------
    Route::get('/mypage/profile', 'ProfEditMypageController' )->name('profEdit');

    Route::put('/mypage', 'ProfUpdateMypageController')->name('profUpdate');

    // --------------------
    // マイページパスワード変更
    // --------------------
    Route::get('/mypage/password', 'showPassEditController')->name('passEdit');

    Route::put('/mypage', 'updatePassEditController')->name('passUpdate');
    
    
    // --------------------
    // 写真投稿
    // --------------------
    Route::get('/photoedit', 'ShowPhotoEditController')->name('photoEdit');

    Route::post('/photoedit', 'CreatePhotoEditController')->name('createPhotoEdit');

    // --------------------
    // 写真編集
    // --------------------
    Route::get('/photoedit/{id}/edit', 'EditPhotoEditController')->name('editPhotoEdit');

    Route::post('/photoedit/{id}', 'UpdatePhotoEditController')->name('updatePhotoEdit');
    
    // --------------------
    // 退会機能
    // --------------------
    Route::post('/delete', 'UserDeleteController@userDelete')->name('userDelete');
    
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

