<?php

namespace App\Providers;

use App\Models\LogActivity;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
        View::composer('*', function ($view) {
            $logs = Cache::remember('logs', now()->addMinutes(60), function () {
                return LogActivity::all();
            });
            
            $logs = LogActivity::all();
            $view->with([
                'logs' => $logs,
            ]);
        });
    }
}
