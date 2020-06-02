<?php

namespace Skydiver\LaravelDashboardPackagist;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BaseComponent extends Component
{
    const API_BASE_URL = 'https://packagist.org';
    const DEFAULT_CACHE_TIMEOUT = 600;

    public function fetchPackageInfo(string $package = null) :array
    {
        $package = $package ?? $this->package;

        $cacheKey = sprintf('dashboard-packagist-tile-%s', $package);
        $cacheTimeout = $this->cacheTimeout ?? self::DEFAULT_CACHE_TIMEOUT;

        if ($this->forceRefresh === true) {
            Cache::forget($cacheKey);
        }

        $packageInfo = Cache::remember($cacheKey, $cacheTimeout, function () use ($package) {
            $apiUrl = sprintf('%s/packages/%s.json', self::API_BASE_URL, $package);

            $response = Http::get($apiUrl);
            $packageInfo = $response->json();

            $packageInfo['updated_at'] = Carbon::now()->toDateTimeString();
            return $packageInfo;
        });

        return $packageInfo;
    }
}
