<?php

namespace App\Providers;

use App\Basket;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.header',function($view){
            $auth=auth()->user();
            if($auth != null){
                $baskets=Basket::where('user_id',auth()->user()->id)->where('status','0')->get();
                $view->with([
                    'baskets'=>$baskets,
                ]);
            }
            else{

                $view->with([
                    'baskets'=>null,
                ]);
            }

        });
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
