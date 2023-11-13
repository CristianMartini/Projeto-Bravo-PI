<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Contracts\View\View;
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
    public function boot()
    {
        // Compartilhar categorias com todas as views
        view()->composer('*', function ($view) {
            $view->with('categorias', Categoria::all());
        });
    }
}
