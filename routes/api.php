<?php

use App\Http\Controllers\CreateStudentController;
use App\Http\Controllers\GetStudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('students', [GetStudentsController::class]);
Route::post('students', CreateStudentController::class);
