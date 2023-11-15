<?php

namespace App\Providers;

use App\Models\Advert;
use App\Models\Annoucement;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('announcment', Annoucement::latest()->first());
        View::share('settings', Setting::latest()->first());
        View::share('site_menu', Menu::get());
        View::share('site_categories', Category::with('products')->has('products')->take(6)->get());
        View::share('advert_top', Advert::where('placement', 'top')->first());
        }
}
