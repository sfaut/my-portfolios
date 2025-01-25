@props([
    'type' => 'info',
])

@php
    // https://laravel.com/api/11.x/Illuminate/View/ComponentAttributeBag.html

    $colors = [
        'info' => 'sky',
        'success' => 'emerald',
        'warning' => 'amber',
        'danger' => 'rose',
    ];

    if (!isset($colors[$type])) {
        $type = 'info';
    }

    $color = $colors[$type];

    $asset = [
        "text-{$color}-800", "bg-{$color}-200",
        'ring-1', "ring-{$color}-500", 'shadow-md',
        // "dark:bg-{$color}-800", "dark:text-{$color}-400",
    ];

    $attributes = $attributes
        ->class([
            'whitespace-pre-line',
            'rounded-md',
            'flex', 'items-center',
            'px-5', 'gap-5',
        ])->merge(['class' => implode(' ', $asset)]);
    ;
@endphp

<div {{ $attributes }}>
    <div>
        <svg width="25" height="25" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
    </div>
    <div>{{ $slot }}</div>
</div>
