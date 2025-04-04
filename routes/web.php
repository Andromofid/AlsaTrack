<?php

use App\Http\Controllers\BusTrackingController;
use App\Models\Buc;
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

Route::get('/tracking/{bus}',[BusTrackingController::class,'index'])->name('bus.track');


Route::get('/', function () {
    $bus = Buc::all();
    return view('home',compact('bus'));
});

Route::get('/bus/{bus}', function ($bus) {
    $bus = Buc::find($bus);
    return view('bus',compact('bus'));
});