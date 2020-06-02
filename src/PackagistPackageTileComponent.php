<?php

namespace Skydiver\LaravelDashboardPackagist;

class PackagistPackageTileComponent extends BaseComponent
{
    public $position;
    public $package;
    public $cacheTimeout;
    public $forceRefresh;
    public $showLogo;

    public $packageInfo;

    public function mount(
        string $position,
        string $package,
        int $cacheTimeout = null,
        bool $forceRefresh = false,
        bool $showLogo = true
    ) {
        $this->position = $position;
        $this->package = $package;
        $this->cacheTimeout = $cacheTimeout;
        $this->forceRefresh = $forceRefresh;
        $this->showLogo = $showLogo;

        $this->packageInfo = $this->fetchPackageInfo();

        dd($this->packageInfo);

    }

    public function render()
    {
        return view('dashboard-packagist-tile::package-tile');
    }
}
