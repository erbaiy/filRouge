<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatisiqueController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Auth;

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



// routes/web.php
// routes/web.php

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'process'])->name('payment.process');

Route::get('/Unauthorized', function () {
    return view('responses.Unauthorized');
})->name('unauthorize');
Route::fallback(function () {
    return view('responses.errors404');
});

// public Route
Route::get('/', [HomeController::class, 'index'])->name('acceuille');
Route::get('/filterRooms/{categoryId}/{checkinDate}/{checkoutDate}', [HomeController::class, 'filterRooms'])->name('filter.rooms');

Route::get('/detail/{id}', [HomeController::class, "detail"])->name('rooms.detail');
Route::get('/gallery', [HomeController::class, "gallery"])->name('rooms.gallery');
Route::get('/services', [HomeController::class, "service"])->name('rooms.services');
// authentification public
Route::get('/registerview', [AuthentificationController::class, 'getRogister'])->name("auth_getRogister");
Route::get('/getLogin', [AuthentificationController::class, 'getLogin'])->name("auth_getLogin");
Route::post('/register', [AuthentificationController::class, 'register'])->name("auth_Rogister");
Route::post('/login', [AuthentificationController::class, 'login'])->name("auth_Login");
Route::get('/forgetpassword', [ForgetPassword::class, 'forgetPassword'])->name("auth_forgetPassword");
Route::get('/resetwithemail/{token}', [ForgetPassword::class, 'getThenewPassword'])->name('resetwithemail');
Route::post('/sendToEmail', [ForgetPassword::class, 'sendToEmail'])->name("auth_sendToEmail");
Route::post('/insertnewpassword/{token}', [ForgetPassword::class, 'addNewPassword'])->name('new_password');

// Route::group(
//     ['middleware' => [Auth::class]],
//     function () {
//         Route::post('/reserve', [HomeController::class, 'reserve'])->name("reserve");
//         Route::get('/statistique', [StatisiqueController::class, "adminStatistique"]);
//         Route::get('/organizerStatistique', [StatisiqueController::class, "organizerStatistique"])->middleware('organizer');
//         // back-office
//         Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//         Route::put('/annulerReservation/{id}', [ProfileController::class, 'annulerReservation'])->name('annulerReservation');
//         // the below code  is all routes has rolation with authentification:
//         Route::post('/register', [AuthentificationController::class, 'register'])->name("auth_Rogister");
//         Route::post('/login', [AuthentificationController::class, 'login'])->name("auth_Login");
//         Route::get('/logout', [AuthentificationController::class, 'logout'])->name("auth_Logout");

//         Route::post('/sendToEmail', [ForgetPassword::class, 'sendToEmail'])->name("auth_sendToEmail");
//         Route::post('/insertnewpassword/{token}', [ForgetPassword::class, 'addNewPassword'])->name('new_password');
//         //category routes
//         Route::get('/category', [CategoryController::class,  'index'])->name('category.index');
//         Route::post('/category/store', [CategoryController::class,  'store'])->name('category.store');
//         Route::put('/category/update/{id}', [CategoryController::class,  'update'])->name('category.update');
//         Route::delete('/category/delete/{id}', [CategoryController::class,  'destroy'])->name('category.destroy');
//         // rooms routes 
//         Route::get('/room', [RoomController::class,  'index'])->name('room.index');
//         Route::post('/romm/store', [RoomController::class,  'store'])->name('room.store');
//         Route::match(['put', 'patch'], '/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
//         Route::delete('/room/delete/{id}', [RoomController::class,  'destroy'])->name('room.destroy');
//         // admin getRoomsForApproval
//         Route::get('/getRoomsForApproval', [RoomController::class,  'getRoomsForApproval'])->name('room.getRoomsForApproval');
//         Route::delete('/room/refuse/{id}', [RoomController::class,  'refuse'])->name('room.refuse');
//         Route::delete('/room/accept/{id}', [RoomController::class,  'accept'])->name('room.accept');
//         // soft delte 
//         Route::get('/getRoomDeteted', [RoomController::class,  'getRoomDeleted'])->name('room.getRoomDeteted');
//         Route::put('/room/restoreRoom/{id}', [RoomController::class,  'restoreRoom'])->name('room.restoreRoom');

//         //Service routes
//         Route::get('/service', [ServiceController::class,  'index'])->name('service.index');
//         Route::post('/service/store', [ServiceController::class,  'store'])->name('service.store');
//         Route::put('/service/update/{id}', [ServiceController::class,  'update'])->name('service.update');
//         Route::delete('/service/delete/{id}', [ServiceController::class,  'destroy'])->name('service.destroy');

//         //Users routes
//         Route::get('/users', [UserController::class,  'index'])->name('users.index');
//         // Route::post('/users/store', [UserController::class,  'store'])->name('user.store');
//         Route::put('/users/update/{id}', [UserController::class,  'update'])->name('users.update');
//         Route::delete('/users/delete/{id}', [UserController::class,  'destroy'])->name('users.destroy');


//         Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
//         Route::post('/roles/store', [RoleController::class,  'store'])->name('roles.store');
//         Route::put('/roles/update/{id}', [RoleController::class,  'update'])->name('roles.update');
//         Route::delete('/roles/delete/{id}', [RoleController::class,  'destroy'])->name('roles.destroy');
//         //Reservations

//         Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');


//         Route::delete('/roles/delete/{id}', [RoleController::class,  'destroy'])->name('roles.destroy');
//     }
// );

Route::group(['middleware' => [Auth::class]], function () {
    // Routes accessible to all authenticated users
    Route::post('/reserve', [HomeController::class, 'reserve'])->name("reserve");
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profileUpdate', [ProfileController::class, 'updateProfile'])->name('UpdateProfile');
    Route::put('/annulerReservation/{id}', [ProfileController::class, 'annulerReservation'])->name('annulerReservation');
    Route::put('/updateReservation/{reservationId}', [ProfileController::class, 'updateReservation'])->name('updateReservation');

    Route::get('/logout', [AuthentificationController::class, 'logout'])->name("auth_Logout");
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

    // Routes accessible only to admin users
    Route::group(['middleware' => [AdminMiddleware::class]], function () {
        Route::get('/statistique', [StatisiqueController::class, "adminStatistique"]);
        Route::get('/category', [CategoryController::class,  'index'])->name('category.index');
        Route::post('/category/store', [CategoryController::class,  'store'])->name('category.store');
        Route::put('/category/update/{id}', [CategoryController::class,  'update'])->name('category.update');
        Route::delete('/category/delete/{id}', [CategoryController::class,  'destroy'])->name('category.destroy');
        Route::get('/getRoomsForApproval', [RoomController::class, 'getRoomsForApproval'])->name('room.getRoomsForApproval');
        Route::delete('/room/refuse/{id}', [RoomController::class, 'refuse'])->name('room.refuse');
        Route::delete('/room/accept/{id}', [RoomController::class, 'accept'])->name('room.accept');
        Route::get('/getRoomDeteted', [RoomController::class, 'getRoomDeleted'])->name('room.getRoomDeteted');
        Route::put('/room/restoreRoom/{id}', [RoomController::class, 'restoreRoom'])->name('room.restoreRoom');
        Route::get('/service', [ServiceController::class,  'index'])->name('service.index');
        Route::post('/service/store', [ServiceController::class,  'store'])->name('service.store');
        Route::put('/service/update/{id}', [ServiceController::class,  'update'])->name('service.update');
        Route::delete('/service/delete/{id}', [ServiceController::class,  'destroy'])->name('service.destroy');
        Route::get('/users', [UserController::class,  'index'])->name('users.index');
        Route::post('/users/store', [UserController::class,  'store'])->name('user.store');
        Route::put('/users/update/{id}', [UserController::class,  'update'])->name('users.update');
        Route::delete('/users/delete/{id}', [UserController::class,  'destroy'])->name('users.destroy');
        Route::put('/users/block/{id}', [UserController::class,  'block'])->name('blockUser');
        Route::resource('roles', RoleController::class);
        Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
    });

    // Routes accessible only to organizer users
    Route::group(['middleware' => ['organizer']], function () {
        Route::get('/organizerStatistique', [StatisiqueController::class, "organizerStatistique"]);
        Route::get('/room', [RoomController::class,  'index'])->name('room.index');
        Route::post('/romm/store', [RoomController::class,  'store'])->name('room.store');
        Route::match(['put', 'patch'], '/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
        Route::delete('/room/delete/{id}', [RoomController::class,  'destroy'])->name('room.destroy');
    });
});



// RESERVATION ROUTES

// Route::post('/reserve', [ResevationController::class,  'index'])->name('service');
