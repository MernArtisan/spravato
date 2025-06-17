<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/admin.php'));

            // Route::prefix('api')
            //     ->middleware('api')
            //     ->group(base_path('routes/api.php'));
        });
    }
}
