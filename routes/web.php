<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\UserLockerContorller;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});
Route::get('/dashboard',[DashboardController::class,'dashboard'] );
Route::get('/dashboard/@{location}',[DashboardController::class,'dashboard'] );


Route::get('/locker/@{location}/{lockerid}', [UserLockerContorller::class, 'lockerpage'])->name('locker.page');

Route::post('/locker/@{location}/{lockerid}/setLock', [DoorController::class,'setLock'])->name('Lock');
Route::post('/locker/@{location}/{lockerid}/setUnlock', [DoorController::class,'setUnlock'])->name('Unlock');
