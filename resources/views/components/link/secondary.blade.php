@props([
    'target',
])

<a
    href="{{ $target }}"

    @class([
        'rounded-md',
        'bg-secondary-300',
        'px-4', 'py-2',
        'text-gray-800', 'text-xs', 'font-semibold', 'uppercase', 'tracking-widest',
        "hover:bg-secondary-400",
        'active:ring-2', 'active:ring-secondary-400', 'active:ring-offset-2',
        'transition-all', 'duration-100', 'ease-linear',
    ])

>{{ $slot }}</a>
