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
    return view('layout');
});
route::get('login','loginController@getLogin')->name('login');
route::post('login','loginController@postLogin')->name('loginpost');
route::get('logout','loginController@logout')->name('logout');

route::get('quen-mat-khau','loginController@getForgotpassword')->name('forgotpasswordget');
route::post('quen-mat-khau','loginController@postForgotpassword')->name('forgotpasswordpost');

route::get('kiem-tra','loginController@testpassword')->name('login.test');

route::get('lay-lai-mat-khau','loginController@getConfirmpassword')->name('login.getConfirm');
route::post('lay-lai-mat-khau','loginController@postConfirmpassword')->name('login.postConfirm');
