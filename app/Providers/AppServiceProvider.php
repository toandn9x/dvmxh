<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        try {
            if (Schema::hasTable('settings')) {
                $telegramToken = setting('telegram_token') ?: env('TELEGRAM_BOT_TOKEN');
                if ($telegramToken) {
                    config(['services.telegram-bot-api.token' => $telegramToken]);
                }
            }
        } catch (\Exception $e) {
            // Skip if database is not ready
        }
    }
}
