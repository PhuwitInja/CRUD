<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCRUDController;

Route::resource('info', TestCRUDController::class);

Route::get('/', function () {
    return view('welcome');
});
