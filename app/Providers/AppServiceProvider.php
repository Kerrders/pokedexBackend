<?php

namespace App\Providers;

use App\Http\Interfaces\CsvRepositoryInterface;
use App\Http\Repositories\CsvRepository;
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
        $this->app->bind(CsvRepositoryInterface::class, CsvRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
