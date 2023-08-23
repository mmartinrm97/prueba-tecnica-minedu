<?php

namespace App\Providers;

use App\Repositories\DocenteJubiladoRepository;
use App\Repositories\DocenteJubiladoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DocenteJubiladoRepositoryInterface::class, DocenteJubiladoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
