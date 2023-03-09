<?php

use Illuminate\Support\Facades\Route;

/**
 * controller imports
 */

use App\Http\Controllers\DateTimeController;
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

Route::prefix('date-time')->group(function () {
    // Route::post('/create', [TaskController::class, 'createTask'])->name('createTask');
    // Route::post('/update', [TaskController::class, 'updateTask'])->name('updateTask');
    Route::get('/', [DateTimeController::class, 'getAllRecord'])->name('getAllRecord');
    Route::get('/ping/{area}/{location}', [DateTimeController::class, 'callDateTimeService'])->name('ping');
});
