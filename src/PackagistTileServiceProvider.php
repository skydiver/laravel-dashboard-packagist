<?php

namespace Skydiver\LaravelDashboardPackagist;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PackagistTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('packagist-package-tile', PackagistPackageTileComponent::class);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-packagist-tile'),
        ], 'dashboard-packagist-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-packagist-tile');
    }
}
