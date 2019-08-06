<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use Schema;

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
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        $this->app->bind(Hashids::class, function () {
            return new Hashids('gfe/b[FjFq%g>K#9^hm;{r`?KrxNVMks_<q}sH$9uSgXr#yCqHYb2XXmEd@J.-tsT=_qg', 20);
        });
        Schema::defaultStringLength(191);
    }
}
