<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomizeOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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

Route::post('/customize-order/add-to-cart', [CustomizeOrderController::class, 'addToCart'])->name('add-to-cart')->middleware('mustMember');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'validation'])->name('login-validation');

//logout
Route::get('/logout', [UserController::class, 'logout'])->middleware('mustLogin');
Route::post('/logout',[UserController::class, 'logout'])->middleware('mustLogin')->name('logout');

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'validation'])->name('register-validation');
Route::post('/address/add', [AddressController::class, 'address'])->name('add-address');

//profile
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/updatepassword', [UserController::class, 'updatePassword'])->name('update-password');
Route::post('/profile/editprofile', [UserController::class, 'editProfile'])->name('edit-profile');
Route::post('/profile/address/edit/{id}', [AddressController::class, 'editAddress'])->name('edit-address');
Route::post('/profile/address/delete/{id}', [AddressController::class, 'deleteAddress'])->name('delete-address');


//cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart')->middleware('mustMember');

//transaction
Route::get('/manage-transactions', [TransactionController::class, 'viewTransaction'])->middleware('mustAdmin');
Route::get('/manage-transactions/{transaction_id}', [TransactionController::class, 'viewTransactionDetail'])->middleware('mustAdmin');
Route::post('/pay', [TransactionController::class, 'payTransaction'])->middleware('mustAdmin');