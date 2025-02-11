<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// route 1
Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

// route 2
Route::get('/greet', [App\Http\Controllers\GreetController::class, 'showGreet']);

//Task route
Route::resource('tasks', TaskController::class);