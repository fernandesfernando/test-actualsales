<?php

namespace App\Providers;
use App\Models\Client;
use App\Models\Deal;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['transactions.fields'], function ($view) {
            $clientItems = Client::pluck('name','id')->toArray();
            $view->with('clientItems', $clientItems);
        });
        View::composer(['transactions.fields'], function ($view) {
            $dealItems = Deal::pluck('name','id')->toArray();
            $view->with('dealItems', $dealItems);
        });
        View::composer(['transactions.filter'], function ($view) {
            $clientItems = Client::pluck('name','id')->toArray();
            $dealItems = Deal::pluck('name','id')->toArray();
            $view->with(['dealItems' => $dealItems, 'clientItems' => $clientItems]);
        });
        //
    }
}