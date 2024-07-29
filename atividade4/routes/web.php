<?php

use App\Http\Controllers\LojasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lojas', [LojasController::class, 'showAll']);
Route::get('/lojas/novo', [LojasController::class, 'compose']);
Route::post('/lojas/novo', [LojasController::class, 'store']);

Route::post('/lojas/edit', [LojasController::class, 'edit']);
Route::post('/lojas/update', [LojasController::class, 'update']);
Route::post('/lojas/delete', [LojasController::class, 'delete']);
