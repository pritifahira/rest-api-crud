<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatakuliahController;

Route::get('/user',[UserController::class, 'index']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::patch('/user/{id}',[UserController::class, 'update']);

Route::get('/mahasiswa',[MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{id}',[MahasiswaController::class, 'show']);

Route::get('/matakuliah',[MatakuliahController::class, 'index']);
Route::get('/matakuliah/{id}',[MatakuliahController::class, 'show']);
Route::post('/matakuliah', [MatakuliahController::class, 'store']);
Route::patch('/matakuliah/{id}', [MatakuliahController::class, 'update']);
Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'destroy']);

Route::get('/prodi',[ProdiController::class, 'index']);

Route::post('/register', [AuthenticationController::class, 'register']); 

Route::post('/login',[AuthenticationController::class, 'login']);
Route::get('/logout',[AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me',[AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);