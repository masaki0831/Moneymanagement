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

Route::get('/', 'BalanceController@index')->middleware('auth');


Route::get('payment','PaymentController@add')->middleware('auth');
Route::post('payment','PaymentController@payment')->middleware('auth');
Route::get('withdrawal','WithdrawalController@add')->middleware('auth');
Route::post('withdrawal','WithdrawalController@withdrawal')->middleware('auth');
Route::get('edit','BalanceController@edit')->middleware('auth');
Route::post('edit','BalanceController@update')->middleware('auth');
Route::get('search','BalanceController@search')->middleware('auth');
Route::get('delete','BalanceController@delete')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
