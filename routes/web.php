<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\FunctionController;


// Views Routes
Route::get('/', [ViewController::class, 'index']);
Route::get('about', [ViewController::class, 'about']);
Route::get('teacher', [ViewController::class, 'teacher']);
Route::get('vehicle', [ViewController::class, 'vehicle']);
Route::get('contact', [ViewController::class, 'contact']);



// Functions Routes
Route::post('process_contact', [FunctionController::class, 'process_contact']);
