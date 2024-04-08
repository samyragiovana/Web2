<?php

use App\Http\Controllers\LojaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loja',[LojaController::class,'showAll']);
Route::get('/loja/novo',[LojaController::class,'compose']);
Route::post('/loja/novo',[LojaController::class,'store']);

Route ::post('/loja/edit',[LojaController::class,'edit']);
Route ::post('/loja/update',[LojaController::class,'update']);
Route ::post('/loja/delete',[LojaController::class,'delete']);

