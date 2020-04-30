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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UserController')->middleware('auth');

Route::resource('clients', 'ClientController')->middleware('auth');

Route::resource('deals', 'DealController')->middleware('auth');

Route::resource('transactions', 'TransactionController')->middleware('auth');

Route::post('importcsv', ['as' => 'importcsv', 'uses' => 'TransactionController@importCSV'])->middleware('auth');

Route::get('importcsv', 'TransactionController@getImportCSV')->middleware('auth');

Route::get('search', ['as' => 'search', 'uses' => 'TransactionController@search'])->middleware('auth');