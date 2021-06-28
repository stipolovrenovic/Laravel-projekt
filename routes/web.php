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

Route::get('/clients', function () {
    return view('clients.index', [
    	'clients' => App\Client::all();
    ]);
});

Route::get('/clients', 'ClientController@index');
Route::post('/clients', 'ClientController@store');
Route::get('/clients/create', 'ClientController@create');
Route::get('/clients/{client}/edit', 'ClientController@edit');
Route::put('/clients', 'ClientController@update');
Route::delete('/clients', 'ClientController@delete');
