<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    public function map()
    {


        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapPanchayatRoutes();

        $this->mapOfficerRoutes();






    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             //->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
            // ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    public function mapAdminRoutes()
    {
        Route::middleware('web')
        ->group(base_path('routes/admin.php'));
    }


    public function mapPanchayatRoutes()
    {
        Route::middleware('web')
        ->group(base_path('routes/panchayat.php'));
    }

    public function mapOfficerRoutes()
    {
        Route::middleware('web')
        ->group(base_path('routes/officer.php'));
    }


}
