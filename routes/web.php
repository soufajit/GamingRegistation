<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gameMembershipController;

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

Route::get('/user', function () {
    return view('user');
});
Route::get('/', [gameMembershipController::class, 'plan']);
Route::get('/total', [gameMembershipController::class, 'total']);

Route::post('api/fetch-total', [gameMembershipController::class, 'total']);

Route::post('datasubmit', [gameMembershipController::class, 'store']);

// Route::get('/user', [gameMembershipController::class, 'user']);