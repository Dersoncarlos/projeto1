<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UrlRepository;
use App\Repositories\Implemetations\MysqlUrlRepository;

class UrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UrlRepository::class, MysqlUrlRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
