<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

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

Route::middleware("guest")->group(function(){
    Route::get("/", [SigninController::class, "index"]);
    Route::get("/register", [RegisterController::class, "index"]);
    Route::post("/register", [RegisterController::class, "store"]);
    Route::get("/signin", [SigninController::class, "index"])->name("signin");
    Route::post("/signin", [SigninController::class, "authenticate"]);
});

Route::middleware("auth")->group(function(){
    Route::get("/dashboard", [DashboardController::class, "index"]);
    Route::resource("/dashboard/post", DashboardPostController::class);
    Route::post("/cetak", [DashboardPostController::class, "cetak"]);
    Route::get("/signout", [SigninController::class, "signout"]);
});