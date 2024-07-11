<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loan.apply_components.job');
});

Route::group(['namespace' => 'Loan'], function () {
    Route::group(['namespace' => 'Form', 'prefix' => 'apply_for_loan'], function () {
        Route::get()
    });
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::get('/dump', [\App\Http\Controllers\DumpController::class, '__invoke'])->name('dump');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Guest', 'prefix' => 'guests'], function () {
    Route::get('/check', [\App\Http\Controllers\Guest\CheckController::class, '__invoke'])->name('guest.check');
    Route::get('/', [\App\Http\Controllers\Guest\IndexController::class, '__invoke'])->name('guest.index');
    Route::get('/create', [\App\Http\Controllers\Guest\CreateController::class, '__invoke'])->name('guest.create');
    Route::get('/{guest}', [\App\Http\Controllers\Guest\ShowController::class, '__invoke'])->name('guest.show');
    Route::post('/', [\App\Http\Controllers\Guest\StoreController::class, '__invoke'])->name('guest.store');
    Route::get('/{guest}/edit', [\App\Http\Controllers\Guest\EditController::class, '__invoke'])->name('guest.edit');
    Route::patch('/{guest}/edit', [\App\Http\Controllers\Guest\UpdateController::class, '__invoke'])->name('guest.update');
    Route::delete('/{guest}', [\App\Http\Controllers\Guest\DeleteController::class, '__invoke'])->name('guest.delete');


//    Route::group(['namespace' => 'Bank', 'prefix' => 'banks'], function () {
//        Route::get('/', [\App\Http\Controllers\Guest\Bank\IndexController::class, '__invoke'])->name('bank.bank.index');
//        Route::get('/create', [\App\Http\Controllers\Guest\Bank\CreateController::class, '__invoke'])->name('bank.create');
//        Route::get('/{bank}/edit', [\App\Http\Controllers\Guest\EditController::class, '__invoke'])->name('bank.edit');
//        Route::patch('/{bank}/edit', [\App\Http\Controllers\Guest\Bank\UpdateController::class, '__invoke'])->name('bank.update');
//        Route::post('/', [\App\Http\Controllers\Guest\Bank\StoreController::class, '__invoke'])->name('bank.store');
//        Route::delete('/{bank}', [\App\Http\Controllers\Guest\Bank\DeleteController::class, '__invoke'])->name('bank.delete');
//    });
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\IndexController::class, '__invoke'])->name('admin.dashboard.index');
    });

});
//Route::middleware('auth')->group(function () {
//    Route::get('dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
