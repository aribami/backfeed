<?php

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
    return view('welcome');
});
Route::get('feedback/{user_id}', function ($user_id) {
        return view("form", ["user_id"=>$user_id]);
});
Auth::routes();
Route::post('feedback/{user_id}/submit', function (User $user) {
 $feedback=request()->all();
 ddd($feedback);

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
