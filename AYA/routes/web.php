<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


// Route::get('/home', [App\Http\Controllers\ReservationController::class, 'index']); // localhost:8000/
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('restaurant/{resID}/{resName}/{curr}', [App\Http\Controllers\RestaurentController::class, 'index'])->name('restaurant.index');
Route::get('show/{resID}', [App\Http\Controllers\RestaurentController::class, 'LiraDollar'])->name('restaurant.changeCurr');
Route::get('/reservation/{resID}/{resName}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation.index');
Route::post('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::post('/orderForm', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
Route::post('/orderInfo', [App\Http\Controllers\OrderController::class, 'submit'])->name('order.placeOrder');
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'submit'])->name('reservation.submit');
Route::get('/aboutus', [App\Http\Controllers\NavController::class, 'aboutUsShow'])->name('aboutus.show');
Route::get('/feedback', [App\Http\Controllers\NavController::class, 'feedbackShow'])->name('feedback.show');
Route::post('/feedbackSend', [App\Http\Controllers\NavController::class, 'feedbackIndex'])->name('feedback.index');
// Route::get('/feedback', [App\Http\Controllers\NavController::class, 'feedbackShow'])->name('feedback.show');
// Route::get('/restaurant', function () {
//     return view('restaurant');
// });
Route::get('image/{taco.gif}', 'HomeController@displayImage')->name('image.displayImage');