<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductVariant;
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
        $data1 = ProductVariant::get();
        view()->share('data1', $data1);
    }
}
