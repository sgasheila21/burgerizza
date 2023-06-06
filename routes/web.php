<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CustomizeOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/home', [HomeController::class, 'index'])->middleware('mustLogin');
Route::get('/about-us', [AboutUsController::class, 'index'])->middleware('mustLogin');

Route::get('/customize-order/{category_name}', [CustomizeOrderController::class, 'index'])->middleware('mustLogin');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'validation'])->name('login-validation');

Route::get('/logout', [UserController::class, 'logout'])->middleware('mustLogin');;

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'validation'])->name('register-validation');