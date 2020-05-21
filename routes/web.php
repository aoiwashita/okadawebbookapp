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
    return view('welcome');
});

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@login');
Route::get('login', 'LoginController@login_succsess');
Route::post('login', 'LoginController@login_succsess');

Route::get('after_login_top', function(){
  return view('after_login_top');
});
Route::post('after_login_top', function(){
  return view('after_login_top');
});

Route::get('/member_withdrawal', 'MemberController@remove_member');
Route::post('/member_withdrawal_complete', 'MemberController@delete_member');
Route::get('/member_withdrawal_complete', function(){
  return view('member_withdrawal_complete');
});


Route::get('document_delete', 'ResisterCatalogController@remove_document');
Route::post('document_delete_complete', 'ResisterCatalogController@delete_document');
Route::get('document_delete_complete', function(){
  return view('document_delete_complete');
});
