<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthentificationController;
use  App\Http\Controllers\ForgetPassword;

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
Route::get('/app', function () {
    return view('app.app');
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

Route::get('/getRogister', [AuthentificationController::class, 'getRogister'])->name("auth_getRogister");
Route::post('/register', [AuthentificationController::class, 'register'])->name("auth_Rogister");

Route::get('/getLogin', [AuthentificationController::class, 'getLogin'])->name("auth_getLogin");
Route::post('/login', [AuthentificationController::class, 'login'])->name("auth_Login");
Route::get('/logout', [AuthentificationController::class, 'logout'])->name("auth_Logout");


Route::get('/forgetpassword', [ForgetPassword::class, 'forgetPassword'])->name("auth_forgetPassword");
Route::post('/sendToEmail', [ForgetPassword::class, 'sendToEmail'])->name("auth_sendToEmail");
Route::get('/resetwithemail/{token}', [ForgetPassword::class, 'getThenewPassword'])->name('resetwithemail');
Route::post('/insertnewpassword/{token}', [ForgetPassword::class, 'addNewPassword'])->name('new_password');
