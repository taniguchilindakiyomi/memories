<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoriesController;

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

Route::get('/', [MemoriesController::class, 'index']);

Route::get('/create', [MemoriesController::class, 'create']);

Route::post('/memories', [MemoriesController::class, 'store']);

Route::get('/detail/{id}', [MemoriesController::class, 'detail']);

Route::get('/edit/{id}', [MemoriesController::class, 'edit']);

Route::put('/memories/{id}', [MemoriesController::class, 'update']);

Route::delete('/memories/{id}', [MemoriesController::class, 'destroy']);