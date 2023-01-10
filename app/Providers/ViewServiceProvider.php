<?php

namespace App\Providers;

use App\Models\MobileBrand;
use App\Models\MobileModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(["frontend.partials.left_sidebar_mobile_brand", "frontend.partials.nav_mobile_brand"], function($view){
            $mobile_brands = MobileBrand::orderBy('visitor_count', 'DESC')->get();
            $view->with("mobile_brands", $mobile_brands);
        });

        View::composer(["frontend.partials.left_sidebar_mobile_price", "frontend.partials.nav_mobile_price"], function($view){
            $mobile_prices = config('mobileprice');
            $view->with("mobile_prices", $mobile_prices);
        });

        View::composer("frontend.partials.left_sidebar_popular_mobile", function($view){
            $mobile_models = MobileModel::select('id', 'model_name', 'model_slug')->where('is_published', true)->orderBy('visitor_count', 'DESC')->take(10)->get();
            $view->with("mobile_models", $mobile_models);
        });
    }
}