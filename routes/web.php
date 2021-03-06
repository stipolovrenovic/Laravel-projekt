<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
	Route::get('/', function () {
		return view('welcome');
	})->name('welcome');

	Route::get('/profile', [UserController::class, 'edit'])->name('users.edit');
	Route::get('/profile/delete-image', [UserController::class, 'deleteImage'])->name('users.deleteImage');
	Route::put('/profile', [UserController::class, 'update'])->name('users.update');

	Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
	Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
	Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
	Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
	Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
	Route::get('/clients/edit/{image}', [ClientController::class, 'deleteImage'])->name('clients.deleteImage');
	Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

	Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
	Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
	Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
	Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
	Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
	Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
});


Route::middleware(['auth', 'admin'])->group(function () {
	Route::delete('/clients', [ClientController::class, 'destroyChecked'])->name('clients.destroyChecked');
	Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

	Route::delete('/projects', [ProjectController::class, 'destroyChecked'])->name('projects.destroyChecked');
	Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});


