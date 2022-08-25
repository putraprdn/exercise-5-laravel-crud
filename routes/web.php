<?php

use App\Http\Controllers\ItemController;
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

// Index
Route::get('/', [ItemController::class, 'index']);

// Create
Route::get('/create', [ItemController::class, 'create'])->name("create");
Route::post('/store', [ItemController::class, 'store'])->name("store");

// Edit
Route::get('/edit/{id}', [ItemController::class, 'edit'])->name("edit");
Route::post('/update/{id}', [ItemController::class, 'update'])->name("update");

// Destroy
Route::delete('/destroy/{id}', [ItemController::class, 'destroy'])->name("destroy");
