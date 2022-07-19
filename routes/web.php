<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\usercontroller;
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
    return view('welcome')->name('HOME');
});

Route::middleware('guest')->group(function()
{
    
Route::get('registerform',[usercontroller::class,'registerform']);
Route::get('loginform',[usercontroller::class,'loginform'])->name('login');
Route::post('profile',[usercontroller::class,'login']);
Route::post('registeredaccount/profile',[usercontroller::class,'register']);

}); 

Route::middleware('auth')->group(function()
{
Route::post('posting',[usercontroller::class,'addpost']);
Route::post('logout',[usercontroller::class,'logout']);
Route::post('addcomment',[usercontroller::class,'addcomment']);
Route::get('profile',[usercontroller::class,'profile']);
Route::post('showcomment/{id}',[usercontroller::class,'showcomment']);
Route::post('like/{id}',[usercontroller::class,'like']);
Route::post('share/{id}',[usercontroller::class,'share']);
Route::get('home',[usercontroller::class,'home']);
Route::post('friendrequest/{id}',[usercontroller::class,'friendrequest']);


}); 