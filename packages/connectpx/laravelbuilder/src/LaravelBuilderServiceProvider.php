<?php
namespace Connectpx\LaravelBuilder;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;
use Connectpx\LaravelBuilder\Facades\LaravelBuilder as LaravelBuilderFacade;

class LaravelBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('LaravelBuilder', LaravelBuilderFacade::class);

        $this->app->singleton('laravelbuilder', function () {
            return new LaravelBuilder();
        });

        $this->loadHelpers();
        $this->registerConfigs();

        if ($this->app->runningInConsole()) {
            $this->registerPublishableResources();
        }
    }

    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router, Dispatcher $event)
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravelbuilder');

        $this->registerViewComposers();
    }

    /**
     * Register view composers.
     */
    protected function registerViewComposers()
    {
        // Register alerts
        View::composer('voyager::*', function ($view) {
            // $contents = $view->getFactory()->getSections();
            // dd($contents);
            // config(['voyager.additional_css' => config('laravelbuilder.styles')]);
            // config(['voyager.additional_js' => config('laravelbuilder.scripts')]);

            // $view->with('laravelbuilder_scripts', ['xyx', '123']);
            // $view->with('laravelbuilder_styles', ['xyx', '123']);
        });
    }

    /**
     * Register the publishable files.
     */
    private function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__).'/publishable';

        $publishable = [
            'config' => [
                "{$publishablePath}/config/laravelbuilder.php" => config_path('laravelbuilder.php'),
            ],
            'assets' => [
                "{$publishablePath}/assets/" => public_path('laravelbuilder'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    public function registerConfigs()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/publishable/config/laravelbuilder.php', 'laravelbuilder'
        );
    }

}
