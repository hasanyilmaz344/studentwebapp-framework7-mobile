<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\StudentController::class, 'mainpage'])->name('mainpage');
Route::get('/createstudent', [App\Http\Controllers\StudentController::class, 'createstudent'])->name('createstudent');
Route::get('/updatestudent', [App\Http\Controllers\StudentController::class, 'updatestudent'])->name('updatestudent');
Route::get('/deletestudent', [App\Http\Controllers\StudentController::class, 'deletestudent'])->name('deletestudent');
Route::get('/filter', [App\Http\Controllers\StudentController::class, 'mainpage'])->name('filter');
