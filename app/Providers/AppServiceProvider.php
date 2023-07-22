<?php

namespace App\Providers;
use App\Helper\CartHelper;

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
        // $this->app->singleton(CartHelper::class, function ($app) {
        //     return new CartHelper();
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new CartHelper()
            ]);            
        });
    }
}
