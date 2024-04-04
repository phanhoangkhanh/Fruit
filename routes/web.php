<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
})->name('welcome');

Route::post('login', [Controller::class, 'login'])->name('login');
// Route::post('register', [Controller::class, 'register'])->name('register');

Route::post('logout', function(Request $request){
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return view("welcome");
})->name('logout');

// has Passed Authentication 
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard',[Controller::class, 'dashboard'])->name('dashboard');
    Route::get('customer', [Controller::class, 'customer'])->name('customer');
    Route::get('fruit', [Controller::class, 'fruit'])->name('fruit');
});

