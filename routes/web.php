<?php

use Illuminate\Support\Facades\Route;
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
Route::get('feedback/{user_id}', function ($user_id) {
        return view("form", ["user_id"=>$user_id]);
});
Auth::routes();
Route::post('feedback/{id}', function (User $user) {
    ddd($user->id);
    $name=request("name");
    $text=request("feedback-text");
    $user->feedback()->create(["title"=>"feedback", "content"=>$text, "author"=>$name]);
    return redirect()->back();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');