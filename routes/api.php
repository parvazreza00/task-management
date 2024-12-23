<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserAuthenticatedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// public routes
Route::post('/register', [UserAuthenticatedController::class, 'register']);
Route::post('/login', [UserAuthenticatedController::class, 'login']);

Route::get('/all/tasks', [TaskController::class, 'showAllTasks']);
Route::get('/tasks/{id}', [TaskController::class, 'shwoSingleTask']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tasks/store', [TaskController::class, 'storeApiTask']);
    Route::put('/tasks/{id}', [TaskController::class, 'updateApiTask']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroyApiTask']);

    Route::post('/logout', [UserAuthenticatedController::class, 'logout']);
});
