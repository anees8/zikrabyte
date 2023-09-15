<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::class, 'index'])->name('users.index');

Route::get('users/create-step-one', [UsersController::class, 'createStepOne'])->name('users.create.step.one');
Route::post('users/create-step-one', [UsersController::class, 'postCreateStepOne'])->name('users.create.step.one.post');
  
Route::get('users/create-step-two', [UsersController::class, 'createStepTwo'])->name('users.create.step.two');
Route::post('users/create-step-two',[UsersController::class, 'postCreateStepTwo'])->name('users.create.step.two.post');
  
Route::get('users/create-step-three', [UsersController::class, 'createStepThree'])->name('users.create.step.three');
Route::post('users/create-step-three',[UsersController::class, 'postCreateStepThree'])->name('users.create.step.three.post');
