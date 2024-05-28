<?php

// use App\Http\Controllers\GetStudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\BoundedContext\Student\Infrastructure\GetStudentsController;
use Src\BoundedContext\Student\Infrastructure\CreateStudentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/students', [GetStudentsController::class, 'index']);
Route::get('/students', GetStudentsController::class);
Route::post('/students', CreateStudentController::class);
