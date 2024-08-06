<?php

use App\Models\NewUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [UserController::class, 'generateReport']);

// Display the result
Route::get('/userChart', [UserController::class, 'showReport'])->name('showReport');


