<?php

namespace App\Providers;

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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Maatwebsite\Excel\ExcelServiceProvider::class);
        $this->app->register(\Intervention\Image\ImageServiceProvider::class);
        $this->app->register(\Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class);
        $this->app->register(\Yajra\Datatables\DatatablesServiceProvider::class);
        $this->app->register(\Yajra\Datatables\ButtonsServiceProvider::class);

        $loader = null;
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        }

        // Facades
        if ($loader != null) {
            $loader->alias('Image', \Intervention\Image\Facades\Image::class);
            $loader->alias('Excel', \Maatwebsite\Excel\Facades\Excel::class);

        }

        if (app()->environment() != 'production') {
            // Service Providers
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);

            // Facades
            if ($loader != null) {
                $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
            }
        }

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
        }
    }
}
