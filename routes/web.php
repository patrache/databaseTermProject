<?php

use App\Http\Controllers\channelController;
use App\Http\Controllers\StarController;
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

Route::prefix('star')->group(function(){
    Route::get('/authPage', [StarController::class, 'authenticatePage']);
    Route::get('/requestPage', [StarController::class, 'requestAuthenticatePage']);
    Route::post('/requestAuth', [StarController::class, 'requestAuthentication']);
    Route::post('/authenticate', [StarController::class, 'authenticate']);
});

Route::prefix('channel')->group(function(){
    Route::get('/createChannel', [channelController::class, 'createChannelPage']);
    Route::get('/searchChannel', [channelController::class, 'searchChannelPage']);
    Route::get('/live', [channelController::class, 'livePage']);
    Route::post('/create', [channelController::class, 'createChannel']);
    Route::post('/search', [channelController::class, 'searchChannel']);
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