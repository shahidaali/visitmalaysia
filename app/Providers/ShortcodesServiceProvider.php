<?php

namespace App\Providers;

use App\Shortcodes\CategoryGridShortcode;
use Illuminate\Support\ServiceProvider;
use Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('category_grid', CategoryGridShortcode::class);
    }
}