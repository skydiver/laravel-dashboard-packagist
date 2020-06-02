<x-dashboard-tile :position="$position">
    @includeWhen($showLogo, 'dashboard-packagist-tile::packagist-logo')
    <div class="relative h-full flex items-center">
        <div class="w-full text-center text-gray-800">
            <div class="text-gray-600" style="font-size: 0.7rem">{{ $package }}</div>
            <div class="my-3">
                <div class="text-3xl font-semibold">{{ number_format($packageInfo['package']['downloads']['total']) }}</div>
                <div class="text-xs text-gray-500" style="font-size: 0.6rem">Total Downloads</div>
            </div>
            <div class="flex flex-row text-xs" style="font-size: 0.6rem">
                @include('dashboard-packagist-tile::info-box', ['label' => 'Daily'  , 'icon' => 'daily', 'value' => $packageInfo['package']['downloads']['daily']])
                @include('dashboard-packagist-tile::info-box', ['label' => 'Monthly', 'icon' => 'monthly', 'value' => $packageInfo['package']['downloads']['monthly']])
                @include('dashboard-packagist-tile::info-box', ['label' => 'Stars'  , 'icon' => 'star', 'value' => $packageInfo['package']['github_stars']])
                @include('dashboard-packagist-tile::info-box', ['label' => 'Forks'  , 'icon' => 'fork', 'value' => $packageInfo['package']['github_forks']])
            </div>
        </div>
        <div class="absolute bottom-0 right-0 text-xs text-gray-500 text-right" style="font-size: 0.5rem">Updated at: {{ $packageInfo['updated_at'] }}</div>
    </div>
</x-dashboard-tile>
