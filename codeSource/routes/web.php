<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\controllers\FrontOfficeRoomController;

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

Route::get('/romms', [FrontOfficeRoomController::class, 'index']);
Route::get('/', function () {
    return view('front-office.index');
});
Route::get('/gallery', function () {
    return view('front-office.gallery');
});


// back-office
Route::get('/Dashboard', function () {
    return view('back-office.dashboard');
});
Route::get('/profile', function () {
    return view('back-office.profile');
});

Route::get('/tables', function () {
    return view('back-office.tables');
});


// the below code  is all routes has rolation with authentification:

Route::get('/registerview', [AuthentificationController::class, 'getRogister'])->name("auth_getRogister");
Route::post('/register', [AuthentificationController::class, 'register'])->name("auth_Rogister");

Route::get('/getLogin', [AuthentificationController::class, 'getLogin'])->name("auth_getLogin");
Route::post('/login', [AuthentificationController::class, 'login'])->name("auth_Login");
Route::get('/logout', [AuthentificationController::class, 'logout'])->name("auth_Logout");

Route::get('/forgetpassword', [ForgetPassword::class, 'forgetPassword'])->name("auth_forgetPassword");
Route::post('/sendToEmail', [ForgetPassword::class, 'sendToEmail'])->name("auth_sendToEmail");
Route::get('/resetwithemail/{token}', [ForgetPassword::class, 'getThenewPassword'])->name('resetwithemail');
Route::post('/insertnewpassword/{token}', [ForgetPassword::class, 'addNewPassword'])->name('new_password');
//category routes
Route::get('/category', [CategoryController::class,  'index'])->name('category.index');
Route::post('/category/store', [CategoryController::class,  'store'])->name('category.store');
Route::put('/category/update/{id}', [CategoryController::class,  'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class,  'destroy'])->name('category.destroy');
// rooms routes 
Route::get('/room', [RoomController::class,  'index'])->name('room.index');
Route::post('/romm/store', [RoomController::class,  'store'])->name('room.store');
Route::put('/room/update/{id}', [RoomController::class,  'update'])->name('room.update');
Route::delete('/room/delete/{id}', [RoomController::class,  'destroy'])->name('room.destroy');

//Service routes
Route::get('/service', [ServiceController::class,  'index'])->name('service.index');
Route::post('/service/store', [ServiceController::class,  'store'])->name('service.store');
Route::put('/service/update/{id}', [ServiceController::class,  'update'])->name('service.update');
Route::delete('/service/delete/{id}', [ServiceController::class,  'destroy'])->name('service.destroy');
