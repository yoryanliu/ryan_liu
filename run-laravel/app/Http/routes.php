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

/**
 * 首頁v
 * 詳細資訊
 * 報名v
// * 管理者登入
 * 管理介面v
// * 新增管理者
        設定權限 兩種權限 (全部權限, 只能查看報名人數)
 * 報名人數
 * 新增活動v
 */
Route::pattern('lang', 'en|tw');
Route::get('/{lang?}', [
    'middleware' => 'Locale',
    'uses' => 'RunController@index'
]);

//Route::get('lang/{locale}',function($locale) {
//        Session::put('language', $locale);
//        return Redirect('/');
//});

Route::get('/page/{id}/{lang?}', 'RunController@page');
Route::get('/sign_up/{id}/{lang?}', 'RunController@signUp');
Route::post('/sign_up', 'RunController@do_signUp');

Route::group([ 'middleware' => ['isAdmin', 'Locale'] ], function(){
        Route::get('/admin/{lang?}', 'RunController@admin');

//        Route::get('/admin/{lang?}', [
//            'middleware' => 'Locale',
//            'uses' => 'RunController@admin'
//        ]);

        Route::get('/admin/join_list/{id}/{lang?}', 'RunController@joinList');
        Route::get('/admin/game_add', 'RunController@gameAdd');
        Route::post('/admin/game_add', 'RunController@do_gameAdd');

        Route::get('/admin/admin_add', 'RunController@adminAdd');
        Route::post('/admin/admin_add', 'RunController@do_adminAdd');
});
Route::group(['middleware' => ['web']], function(){
        Route::auth();
//        Route::get('/home', 'HomeController@index');
});
