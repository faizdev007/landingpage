<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');


Route::get('/landingpage',[App\Http\Controllers\Controller::class, 'landingpage'])->name('landingpage');
Route::get('/landing-page/{slug}',[App\Http\Controllers\Controller::class, 'visitlandingpage'])->name('visitlandingpage');

// main admin routs
Route::middleware(['auth','role:0'])->prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('userslist','userslist')->name('userslist');
    Route::get('landingpage','landingpage')->name('landingpage');
    Route::post('savelandingpage','savelandingpage')->name('savelandingpage');
    Route::post('deleteLpage','deleteLpage')->name('deleteLpage');
    Route::get('landingpagerecyclebin','landingpagerecyclebin')->name('landingpagerecyclebin');
});
// end here !
