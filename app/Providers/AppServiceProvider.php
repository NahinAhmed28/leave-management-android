<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }

    public function register(): void
    {
        $this->app->singleton(FortifyLoginResponse::class, CustomLoginResponse::class);
    }
}
