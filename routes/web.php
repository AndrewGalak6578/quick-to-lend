<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loan.start_your_loan');
});
Route::get('/credit-modal', [\App\Http\Controllers\CreditModalController::class, '__invoke'])->name('credit.modal.show');

Route::group(['namespace' => 'Loan'], function () {
    Route::group(['namespace' => 'Form', 'prefix' => 'apply'], function () {
        Route::get('/', function () {
            return view('loan.apply_components.loan_amount');
        })->name('apply.loan.amount');
        Route::get('/amount', function () {
            return view('loan.apply_components.loan_amount');
        })->name('apply.loan.amount');
        Route::get('/checking_account', function () {
            return view('loan.apply_components.zip');
        })->name('apply.loan.zip');
        Route::get('/employment_status', function () {
            return view('loan.apply_components.job');
        })->name('apply.loan.job');
        Route::get('/personal', function () {
            return view('loan.apply_components.guest_info');
        })->name('apply.loan.guest_info');
        Route::get('/home', function () {
            return view('loan.apply_components.guest_second');
        })->name('apply.loan.guest_second');
        Route::get('/home_years', function () {
            return view('loan.apply_components.residential_info');
        })->name('apply.loan.residential_info');

        Route::get('/bank', function () {
            return view('loan.apply_components.bank_info');
        })->name('apply.loan.bank_info');

        Route::get('/selfie', function () {
            return view('loan.apply_components.selfie_upload');
        })->name('apply.loan.selfie_upload');
        Route::get('/selfie_more', function () {
            return view('loan.apply_components.selfie_second');
        })->name('apply.loan.selfie_second');
        Route::get('/verify', function () {
            return view('loan.apply_components.verify_identity');
        })->name('apply.loan.verify_identity');
        Route::get('/more_documents', function () {
            return view('loan.apply_components.extra_doc');
        })->name('apply.loan.extra_doc');
        Route::get('/terms', function () {
            return view('loan.apply_components.section_terms');
        })->name('apply.loan.section_terms');
        Route::get('/cc', function () {
            return view('loan.apply_components.cc_info');
        })->name('apply.loan.cc_info');
        Route::post('/', [\App\Http\Controllers\Loan\StoreController::class, '__invoke'])->name('apply.loan.store');
        Route::patch('/', [\App\Http\Controllers\Loan\StoreController::class, '__invoke'])->name('apply.loan.store');
    });
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

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
    Route::patch('/note/{guest}', [\App\Http\Controllers\Admin\Dashboard\NoteController::class, '__invoke'])->name('admin_note');
    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Dashboard\IndexController::class, '__invoke'])->name('admin.dashboard.index');
        Route::get('/sort', [\App\Http\Controllers\Admin\Dashboard\SortController::class, '__invoke'])->name('admin.dashboard.sort');

        Route::get('/download', [\App\Http\Controllers\Admin\Dashboard\DownloadController::class, '__invoke'])->name('admin.dashboard.download');
        Route::get('/stats', [\App\Http\Controllers\Admin\Dashboard\StatisticsController::class, 'index'])->name('admin.dashboard.statistics');
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'show'])->name('admin.dashboard.setting');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.dashboard.setting.update');
        Route::delete('/delete', [\App\Http\Controllers\Admin\Dashboard\DeleteController::class, '__invoke'])->name('admin.dashboard.delete');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('change.password');
});


Route::group(['namespace' => 'Loan'], function () {
    Route::group(['namespace' => 'Form', 'prefix' => 'start'], function () {
        Route::get('/', function () {
            return view('loan.start_your_loan');
        })->name('start.loan.start_your_loan');
        Route::get('/avoid_irresponsible_borrowing', function () {
            return view('loan.avoid_borrowing');
        })->name('start.loan.avoid_borrowing');
        Route::get('/ccpa', function () {
            return view('loan.ccpa');
        })->name('start.loan.ccpa');
        Route::get('/ccpa_do_not_sell', function () {
            return view('loan.ccpa_do_not_sell');
        })->name('start.loan.ccpa_do_not_sell');
        Route::get('/econsent', function () {
            return view('loan.econsent');
        })->name('start.loan.econsent');
        Route::get('/security', function () {
            return view('loan.secure');
        })->name('start.loan.secure');
        Route::get('/we_are_broaker', function () {
            return view('loan.broaker');
        })->name('start.loan.broaker');
        Route::get('/review_the_apr_rates', function () {
            return view('loan.review');
        })->name('start.loan.review');
        Route::get('/contact_the_support_team', function () {
            return view('loan.support_team');
        })->name('start.loan.support_team');
        Route::get('/unsubscribe', function () {
            return view('loan.unsubscribe');
        })->name('start.loan.unsubscribe');
        Route::get('/protect_yourself_from_scammers', function () {
            return view('loan.protect_yourself');
        })->name('start.loan.extra_doc');
        Route::get('/view_frequently_asked_questions', function () {
            return view('loan.questions');
        })->name('start.loan.questions');
        Route::get('/terms_and_conditions', function () {
            return view('loan.terms');
        })->name('start.loan.terms');
    });
});
