<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return redirect()->route('jobs.index');
});

Route::resource('jobs',\App\Http\Controllers\JobController::class);

Route::get('login',[AuthController::class,'create'])->name('auth.create');
Route::post('login',[AuthController::class,'store'])->name('auth.store');;
Route::delete('logout',[AuthController::class,'destroy'])->name('auth.destroy');;
