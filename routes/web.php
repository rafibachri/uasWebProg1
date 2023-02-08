<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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
    return view('main.home');
});

Route::get('/success', [ItemController::class, 'success'])->name('success');
Route::get('/saved', [UserController::class, 'save'])->name('saved');

Route::get('/vegetable', [ItemController::class, 'data'])->name('vegetable');
Route::get('/vegetabledetail/{id}', [ItemController::class, 'detail']);

Route::get('/login', [UserController::class,'index_login'])->name('index_login')->middleware('authenticateMiddleware');

Route::get('/register', [UserController::class,'index_register'])->name('index_register')->middleware('authenticateMiddleware');

Route::post('/login',[UserController::class,'login'])->name('login');

Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/logout',[UserController::class,'index_logout'])->name('index_logout');

Route::post('/register', [UserController::class,'register'])->name('register');

Route::get('/profile/{id}', [UserController::class,'index_update'])->name('index_update');

Route::post('/profile/{id}',[UserController::class,'update'])->name('update');

Route::get('/editrole/{id}', [UserController::class,'index_update_role'])->name('index_update_role');

Route::post('/editrole/{id}',[UserController::class,'update_role'])->name('update_role');

Route::get('/manageuser', [UserController::class, 'manageuser'])->name('manageuser');

Route::get('/deleteUser/{id}', [UserController::class, 'delete'])->name('delete');

Route::post('/addcart/{id}', [ItemController::class, 'addcart'])->name('addcart');
Route::get('/mycart', [ItemController::class, 'indexcart'])->name('indexcart');

Route::get('/remove/{id}', [ItemController::class, 'remove'])->name('remove');