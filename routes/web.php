<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLockerContorller;

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

Route::middleware(['auth.required'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard',[DashboardController::class,'dashboard'] )->name('dashboard');
    Route::get('/dashboard/@{location}',[DashboardController::class,'dashboard'])->name('dashboard_location');

    Route::get('/locker/@{location}/{lockerid}', [UserLockerContorller::class, 'lockerpage'])->name('locker.page');

    Route::post('/locker/@{location}/{lockerid}/setLock', [DoorController::class,'setLock'])->name('Lock');
    Route::post('/locker/@{location}/{lockerid}/setUnlock', [DoorController::class,'setUnlock'])->name('Unlock');


    Route::get('/order', [OrderController::class,'order'])->name('order');
    Route::get('/order/@{location}', [OrderController::class,'order'])->name('order-location');
    Route::post('/payment/@{location}', [OrderController::class, 'startPayment'])->name('pay');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/pre-log', [AuthController::class, 'prelogin'])->name('prelog');
    Route::get('/login', [AuthController::class, 'login'])->name('log');
    Route::post('/authlog', [AuthController::class, 'authLog'])->name('authlog');
});


Route::get('/register', [AuthController::class, 'regis'])->name('regis');
Route::post('/regiset/true', [AuthController::class, 'addUser'])->name('addUser');



Route::get('/locker/{lockerid}', [DoorController::class,'getStatusLocker']);



Route::post('/api/login/mobile', [AuthController::class, 'authLogMobile']);
Route::post('/api/register/mobile', [AuthController::class, 'addUsermobile']);



Route::post('/api/logout/mobile', [AuthController::class, 'logoutMobile']);
Route::post('/api/user/mobile', [AuthController::class, 'getUser']);


Route::post('/api/user/getListLocker', [DashboardController::class, 'getAllUserTransaction']);
Route::post('/api/user/orderMobile', [OrderController::class, 'orderMobile']);
