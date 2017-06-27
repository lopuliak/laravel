<?php
namespace App\Providers;
//use App;
use Illuminate\Support\ServiceProvider;
use App\Helpers\Breadcrumbs;
class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('breadcrumbs', function ($app) {
            return new Breadcrumbs();
        });

        $this->app->alias('breadcrumbs', 'App\Helpers\Breadcrumbs');
    }
}
