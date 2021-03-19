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
    return redirect('/users/index');
    //return view('welcome');
});

Route::get('/users/index', [App\Http\Controllers\UsersController::class, 'index']);

Route::get('/todos/show/{userId}', [App\Http\Controllers\TodosController::class, 'show']);
Route::get('/todos/{userId}/edit', [App\Http\Controllers\TodosController::class, 'edit']);
Route::get('/todos/create/{userId}', [App\Http\Controllers\TodosController::class, 'create']);
Route::post('/todos', [App\Http\Controllers\TodosController::class, 'store']);
Route::put('/todos/{todoId}', [App\Http\Controllers\TodosController::class, 'update']);
Route::delete('/todos/{todoId}', [App\Http\Controllers\TodosController::class, 'destroy']);
