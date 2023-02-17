<?php

use App\Http\Controllers\PlanetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', [PlanetController::class, 'index']);
Route::post('/create', [PlanetController::class, 'create'])->name('create');
Route::get('/read', [PlanetController::class, 'read'])->name('read');
Route::post('/update', [PlanetController::class, 'update'])->name('update');
Route::delete('/delete', [PlanetController::class, 'delete'])->name('delete');
Route::get('/edit', [PlanetController::class, 'edit'])->name('edit');