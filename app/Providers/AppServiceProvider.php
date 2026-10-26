<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // On live domains, prevent public/hot from forcing browser to load assets from localhost [::1]:5173
        if (!app()->runningInConsole() && !in_array(request()->getHost(), ['localhost', '127.0.0.1'], true)) {
            if (file_exists(public_path('hot'))) {
                @unlink(public_path('hot'));
            }
        }
    }
}
