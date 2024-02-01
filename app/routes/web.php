<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\QuestionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[QuestionController::class,'index'])->name('home');

Route::get('examens/questions/{Id_examen}',[QuestionController::class,'index'])->name('projects.tasks');

Route::resource('questions', QuestionController::class);
Route::resource('examens', ExamenController::class);

