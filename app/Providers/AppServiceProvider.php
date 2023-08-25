<?php

namespace App\Providers;
use App\Helper\CartHelper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new CartHelper()
            ]);            
        });

        Paginator::useBootstrapFour();
    }
}
