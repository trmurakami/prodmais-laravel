<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\LattesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::resource('people', PersonController::class);
Route::resource('works', WorkController::class);

Route::post('/lattes', [LattesController::class, 'processXML']);