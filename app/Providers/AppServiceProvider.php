<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('routeactive', function ($route, $index = null){

            if (isset($index)){
                $add = "Route::currentRouteNamed($index) ||";
            }else{
                $add = null;
            }
            return "<?php echo $add Route::currentRouteNamed($route) ? 'class=\"active\"' : '' ?>";
        });
    }
}
