@props([
    'target',
])

<a
    href="{{ $target }}"

    @class([
        'rounded-md',
        'bg-primary-800',
        'px-4', 'py-2',
        'text-white', 'text-xs', 'font-semibold', 'uppercase', 'tracking-widest',
        "hover:bg-primary-700",
        'active:ring-2', 'active:ring-primary-700', 'active:ring-offset-2',
        'transition-all', 'duration-100', 'ease-linear',
    ])

>{{ $slot }}</a>
