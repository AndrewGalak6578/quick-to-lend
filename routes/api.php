<?php

use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\Guest\StoreController;
use App\Http\Controllers\Guest\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'Guest', 'prefix' => 'guests'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
    Route::post('/', [StoreController::class, '__invoke']);
    Route::patch('/{guest}', [UpdateController::class, '__invoke']);
});
