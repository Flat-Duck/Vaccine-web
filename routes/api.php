<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::name("api.")->namespace('API')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::get('/qr', 'HomeController@qr');
    Route::group(['middleware' => ['auth:api']], function () {

        Route::get('/posts', 'HomeController@posts');
        Route::get('/swipes', 'HomeController@swipes');
        Route::get('/shots', 'HomeController@shots');
        Route::get('/profile', 'HomeController@profile');
        Route::get('/main', 'HomeController@main');
        
        Route::get('/centers', 'HomeController@centers');
        Route::get('/password', 'HomeController@updatePassword');
        Route::post('/password', 'HomeController@updatePassword');
        
    });
});
