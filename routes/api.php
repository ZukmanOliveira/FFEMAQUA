<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\toolsController;

Route::prefix('auth')->middleware('jwt.auth')->group( function(){
    Route::post('tools/', [toolsController::class, 'store']);
    Route::delete('/tools/{id}', [toolsController::class, 'destroy']);
    Route::delete('/tools/{id}', [toolsController::class, 'refresh']);
    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::get('/tools', [toolsController::class, 'index']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/tools/{id}', [toolsController::class, 'show']);


