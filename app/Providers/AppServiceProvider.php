<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share empty categories array dengan semua views
        View::share('categories', collect([]));

        // Atau jika mau load categories hanya ketika database ready
        View::composer('*', function ($view) {
            try {
                // Cek apakah database dan table categories ada
                if (\Schema::hasTable('categories') && class_exists('App\Models\Category')) {
                    $view->with('categories', \App\Models\Category::all());
                } else {
                    $view->with('categories', collect([]));
                }
            } catch (\Exception $e) {
                // Jika error, kasih array kosong
                $view->with('categories', collect([]));
            }
        });
    }
}
