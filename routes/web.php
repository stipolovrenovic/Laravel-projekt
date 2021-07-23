<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;

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

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
	Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
	Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
	Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
	Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
	Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
	Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
	Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

	Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
	Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
	Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
	Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
	Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
	Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
	Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});



