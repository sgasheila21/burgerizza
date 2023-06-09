<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CustomizeOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::get('{attribute_id}/product/{product_id}', [ProductController::class, 'index'])->middleware('mustAdmin');
Route::post('{attribute_id}/product/{product_id}', [ProductController::class, 'postProduct'])->middleware('mustAdmin');

Route::get('{category_id}/attribute/{attribute_id}', [AttributeController::class, 'index'])->middleware('mustAdmin');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'validation'])->name('login-validation');

Route::get('/logout', [UserController::class, 'logout'])->middleware('mustLogin');;

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'validation'])->name('register-validation');

//profile
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/updatepassword', [UserController::class, 'updatePassword'])->name('update-password');
Route::post('/profile/editprofile', [UserController::class, 'editProfile'])->name('edit-profile');
Route::post('/logout',[UserController::class, 'logout'])->middleware('mustLogin')->name('logout');