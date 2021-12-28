<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FeedbackController;
use App\Models\User;

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
    return view('welcome');
});
Route::get('feedback/{user_id}',[FeedbackController::class, 'create'] );
Auth::routes(['verify'=>true]);

Route::post('feedback/{user}',[FeedbackController::class, 'store'] );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
