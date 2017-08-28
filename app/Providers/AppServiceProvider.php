<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Venda;
use App\Observers\VendaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require base_path('resources/macros/macros.php');
        require base_path('resources/macros/componentes.php');
         Venda::observe(VendaObserver::class);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
