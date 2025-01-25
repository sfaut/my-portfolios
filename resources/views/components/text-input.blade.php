@props([
    'disabled' => false,
])

<input

    type="text"

    @disabled($disabled)

    {{
        $attributes->class([
            'border-gray-300',
            'dark:border-gray-700',
            'rounded-md',
            'dark:bg-gray-900',
            'dark:text-gray-300',
            'focus:border-indigo-500',
            'dark:focus:border-indigo-600',
            'focus:shadow-md',
        ])
    }}
>
