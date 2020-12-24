<?php

use App\Http\Controllers\ContactTypesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Models\LowMotive;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    
    Route::post('details', [UserController::class, 'details']);
    
    Route::Resource('contactType', ContactTypesController::class)->except(['create', 'edit']);
    
    Route::Resource('client', ClientController::class)->except(['create', 'edit']);
    
    Route::Resource('service', ServiceController::class)->except(['create', 'edit']);
    
    Route::post('logout', [UserController::class, 'logout']);

    Route::Resource('status', StatusController::class)->except(['create', 'edit']);

    Route::Resource('lowMotive', LowMotive::class)->except(['create', 'edit']);
});
// Route::apiResource('/api/register','UserController@register');
// Route::apiResource('/api/login','UserController@login');
// Route::apiResource('/api/update','UserController@update');
