<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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


Route::get('/login', function () {
    if (Session::has('user')) {
        return redirect('/');
    } else {
        return view('auth.login');
    }
});


Route::post('/login', 'AuthController@login');

Route::group(['middleware' => 'CheckLogin'], function () {
    Route::get('/', 'UPAController@show')->middleware('admin');
});


Route::get('/logout', 'AuthController@userLogout');
Route::get('/error/access-denied', function () {
    return view('error.access-denied');
});

Route::get('/fetch/upa/cost_dt/{idComp}/{year}', 'UPAController@cost_dt');
Route::get('/fetch/upa/cost_mt/{idComp}/{year}', 'UPAController@cost_mt');
Route::get('/fetch/comp_session/{id}', 'UPAController@compSession');
Route::get('/set/session/comp/{idSidebar}/{idComp}', 'UPAController@compSessionSet');
