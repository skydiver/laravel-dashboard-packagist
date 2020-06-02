<x-dashboard-tile :position="$position">
    @includeWhen($showLogo, 'dashboard-packagist-tile::packagist-logo')
    <div class="relative h-full flex items-center">
        <div class="w-full text-center text-gray-800">
            <div class="text-gray-600" style="font-size: 0.7rem">{{ $package }}</div>
            <div class="my-3">
                <div class="text-3xl font-semibold">{{ number_format($packageInfo['package']['downloads']['total']) }}</div>
                <div class="text-xs text-gray-500" style="font-size: 0.6rem">Total</div>
            </div>
            <div class="flex flex-row text-xs text-gray-600" style="font-size: 0.6rem">
            @foreach (['monthly', 'daily'] as $value)
                <div class="w-1/2 flex flex-col">
                    <div class="flex justify-center font-semibold">{{ number_format($packageInfo['package']['downloads'][$value]) }}</div>
                    <div class="font-semibold text-gray-500">{{ ucfirst($value) }}</div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="absolute bottom-0 right-0 text-xs text-gray-500 text-right" style="font-size: 0.5rem">Updated at: {{ $packageInfo['updated_at'] }}</div>
    </div>
</x-dashboard-tile>
