<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBusController;
use App\Http\Controllers\Admin\AdminStopController;
use App\Http\Controllers\BusTrackingController;
use App\Http\Controllers\StopController;
use App\Models\Buc;
use App\Models\Bus;
use Illuminate\Support\Facades\Route;

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


//======================== FOR USER ============================ // :
Route::get('/', function () {
    $bus = Bus::all();
    return view('home', compact('bus'));
});
Route::get('/tracking/{bus}', [BusTrackingController::class, 'index'])->name('bus.track');

//======================== FOR BUS ============================= // :
Route::get('/bus/{bus}', function ($bus) {
    $bus = Bus::find($bus);
    return view('bus.bus', compact('bus'));
});

//======================== FOR ADMIN =========================== // :
Route::middleware('admin.guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('stops', AdminStopController::class);
    Route::resource('buses', AdminBusController::class);
});
