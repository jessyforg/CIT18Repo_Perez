<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route 1
Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

// route 2
Route::get('/greet', [App\Http\Controllers\GreetController::class, 'showGreet']);
