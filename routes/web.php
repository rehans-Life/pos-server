<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Mail\OrderSuccessfullEmail;
use Illuminate\Http\Request;
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
Route::get('/', [ViewController::class, 'welcome']);

Route::post('/signup', [UserController::class, 'addUser']);

Route::post('/signin', [UserController::class, 'checkUser']);

Route::post('/checkEmail', [UserController::class, 'checkEmail']);

Route::post('/sendEmail', function (Request $req) {
    $email = $req->all()['email'];
    Mail::to($email)->send(new OrderSuccessfullEmail());
    dd("Email Sent Successfully");
});