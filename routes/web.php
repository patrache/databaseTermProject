<?php

use App\Http\Controllers\UserController;
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
    return view('main');
});

// Route::get('/signup', function () {
//     return view('signup');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::prefix('user')->group(function() {
    Route::get('/signup', [UserController::class, 'signupPage']);
    Route::get('/login', [UserController::class, 'loginPage']);
    Route::get('/list', [UserController::class, 'userList']);
    Route::post('/signup', [UserController::class, 'signup']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::get('/authentication', function () {
    return view('authentication');
});

Route::get('/searchChannel', function () {
    return view('searchChannel');
});

Route::get('/createChannel', function () {
    return view('createChannel');
});

Route::get('/channel', function () {
    return view('channel');
});

Route::get('/createPost', function () {
    return view('createPost');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/searchToken', function () {
    return view('searchToken');
});