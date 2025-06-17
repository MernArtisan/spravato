<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AvailaibilityController;


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');

    return "<h4 style='color:green;'>✅ All caches cleared!</h4>
            <a href='javascript:history.back()'>
                <i class='fa fa-angle-left'></i> Go Back
            </a>";
});
Route::post('logout', [DashboardController::class, 'destroy'])->name('admin.logout');
Route::prefix('spravato')->name('admin.')->group(function () {
    Route::group(['middleware' => ['admin.guest']], function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    });

    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('provider',ProviderController::class);
        Route::resource('service',ServiceController::class);
        Route::Put('user_update', [ProviderController::class, 'user_update'])->name('user_update');
        Route::resource('availability', AvailaibilityController::class);

    });
});
