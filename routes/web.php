<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\FunctionController;


// Views Routes
Route::get('/', [ViewController::class, 'home']);
Route::get('about', [ViewController::class, 'about']);
Route::get('teacher', [ViewController::class, 'teacher']);
Route::get('vehicle', [ViewController::class, 'vehicle']);
Route::get('contact', [ViewController::class, 'contact']);
Route::get('edit/{teacherid}', [ViewController::class, 'edit_teacher']);





// Admin
Route::get('signin', [ViewController::class, 'signin']);
Route::get('dashboard', [ViewController::class, 'dashboard']);
Route::post('process_signin', [FunctionController::class, 'process_signin']);
Route::get('manage-teachers', [ViewController::class, 'manage_teachers']);
Route::get('manage-queries', [ViewController::class, 'manage_queries']);
Route::get('manage-tasks', [ViewController::class, 'manage_tasks']);
Route::get('add-teacher', [ViewController::class, 'add_teacher']);

// Functions Routes
Route::post('process_contact', [FunctionController::class, 'process_contact']);
Route::post('/add_teacher_process', [FunctionController::class, 'add_teacher_process']);
Route::post('/edit_teacher_process', [FunctionController::class, 'edit_teacher_process']);
Route::post('remove_teacher', [FunctionController::class, 'remove_teacher']);
