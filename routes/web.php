<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderformController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/order', [OrderformController::class, 'index']);
Route::post('/submit-form', [OrderformController::class, 'submitForm'])->name('form.submit');