<?php

use App\Http\Controllers\VeiculosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/veiculos',[VeiculosController::class,'showAll']);
Route::get('/veiculos/novo',[VeiculosController::class,'compose']);
Route::post('/veiculos/novo',[VeiculosController::class,'store']);

Route ::post('/veiculos/edit',[VeiculosController::class,'edit']);
Route ::post('/veiculos/update',[VeiculosController::class,'update']);
Route ::post('/veiculos/delete',[VeiculosController::class,'delete']);

