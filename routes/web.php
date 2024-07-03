<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'Guest', 'prefix' => 'guests'], function () {
    Route::get('/', [\App\Http\Controllers\Guest\IndexController::class, '__invoke'])->name('guest.index');
    Route::post('/', [\App\Http\Controllers\Guest\StoreController::class, '__invoke'])->name('guest.store');
    Route::get('/create', [\App\Http\Controllers\Guest\CreateController::class, '__invoke'])->name('guest.create');
    Route::get('/{guest}/edit', [\App\Http\Controllers\Guest\EditController::class, '__invoke'])->name('guest.edit');
    Route::patch('/{guest}/edit', [\App\Http\Controllers\Guest\UpdateController::class, '__invoke'])->name('guest.update');
    Route::delete('/{guest}', [\App\Http\Controllers\Guest\DeleteController::class, '__invoke'])->name('guest.delete');

    Route::group(['namespace' => 'Bank', 'prefix' => 'bank'], function () {
        Route::get('/', [\App\Http\Controllers\Guest\IndexController::class, '__invoke'])->name('guest.bank.index');
    });
});
