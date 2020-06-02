<div class="flex flex-col flex-grow">
    <div class="flex justify-center text-gray-600">
        @include('dashboard-packagist-tile::icons.' . $icon)
    </div>
    <div class="mt-1 flex justify-center font-semibold">{{ number_format($value) }}</div>
    <div class="font-semibold text-gray-500">{{ $label }}</div>
</div>
