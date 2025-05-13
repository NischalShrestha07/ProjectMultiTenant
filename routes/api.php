<?php

use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('users', [UserController::class, 'users']);
Route::patch('users/{id}', [UserController::class, 'update']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('tenants', [TenantController::class, 'index']);
Route::post('tenants/create', [TenantController::class, 'store']);
