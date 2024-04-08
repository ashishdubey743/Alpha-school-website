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
Route::get('edit-task/{taskid}', [ViewController::class, 'edit_task']);
Route::get('/import-students', [ViewController::class, 'import_students']);





// Admin
Route::get('signin', [ViewController::class, 'signin']);
Route::get('dashboard', [ViewController::class, 'dashboard']);
Route::post('process_signin', [FunctionController::class, 'process_signin']);
Route::get('manage-teachers', [ViewController::class, 'manage_teachers']);
Route::get('/manage-students', [ViewController::class, 'manage_students']);
Route::get('manage-queries', [ViewController::class, 'manage_queries']);
Route::get('manage-tasks', [ViewController::class, 'manage_tasks']);
Route::get('add-teacher', [ViewController::class, 'add_teacher']);
Route::get('/add-task', [ViewController::class, 'add_task']);

// Functions Routes
Route::post('process_contact', [FunctionController::class, 'process_contact']);
Route::post('/add_teacher_process', [FunctionController::class, 'add_teacher_process']);
Route::post('/add_task_process', [FunctionController::class, 'add_task_process']);
Route::post('/edit_task_process', [FunctionController::class, 'edit_task_process']);
Route::post('/edit_teacher_process', [FunctionController::class, 'edit_teacher_process']);
Route::post('/delete_query', [FunctionController::class, 'delete_query']);
Route::post('/delete_task', [FunctionController::class, 'delete_task']);
Route::post('/import_student_process', [FunctionController::class, 'import_student_process']);
