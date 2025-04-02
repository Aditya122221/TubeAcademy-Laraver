<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('command.serve', \App\Console\Commands\CustomServeCommand::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Validator::extend('uppercase', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[A-Z]/', $value); // Checks for at least one uppercase letter
        });

        Validator::extend('lowercase', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[a-z]/', $value); // Checks for at least one lowercase letter
        });

        Validator::extend('number', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[0-9]/', $value); // Checks for at least one number
        });

        Validator::extend('special_char', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[\W]/', $value); // Checks for at least one special character
        });
    }
}
