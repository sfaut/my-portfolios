<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold">
                    Portfolio <span class="text-indigo-700">{{ $portfolio->name }}</span>
                </h2>
                <div class="text-sm text-gray-400">
                    {{ count($portfolio->accounts) }}
                    {{ Str::of('comptes')->plural(count($portfolio->accounts)) }}
                    {{ Str::of('enregistré')->plural(count($portfolio->accounts)) }}
                </div>
            </div>
            <x-link.secondary :target="route('portfolio.edit', $portfolio)">Modifier le portfolio</x-link.secondary>
        </div>
    </x-slot>

    @if (session('message'))
        <x-alert
            type="success" class="max-w-6xl mx-auto mb-6"
        >
            {{ session('message') }}
        </x-alert>
    @endif

    <div class="max-w-6xl mx-auto mb-6 flex justify-end">
        <x-link.primary :target="route('account.create', $portfolio)">Créer un compte</x-link>
    </div>

    <div class="max-w-6xl mx-auto grid gap-6 grid-cols-3">

        @foreach ($portfolio->accountsReport as $account)

            <a
                href="{{ route('account.show', ['account' => $account]) }}"

                @class([
                    'border',
                    'grid', 'grid-cols-[1fr_min-content]',
                    'block', 'bg-white', 'shadow', 'p-4',
                    'rounded-md',
                    'hover:bg-indigo-700', 'hover:text-white', 'hover:ring-indigo-700',
                    'transition-all', 'duration-100', 'ease-linear', 'hover:scale-103',
                    'opacity-50' => ($account->deleted_at !== null),
                    'hover:opacity-100' => ($account->deleted_at !== null),
                ])
            >
                <div class="truncate">
                    <div class="font-semibold truncate">{{ $account->name }}</div>
                    <div class="text-xs text-gray-400">{{ optional($account->operation_last_at)->format('d/m/Y') }}</div>
                </div>
                <div @class([
                    'text-right',
                    'content-center',
                    'pl-1',
                    // 'text-red-700' => $account->operation_balance < 0,
                    // 'text-emerald-700' => $account->operation_balance == 0,
                    // 'text-blue-700' => $account->operation_balance > 0,
                ])>{{ Number::currency($account->operation_balance, 'EUR', 'fr') }}</div>
            </a>

        @endforeach

        <a
            href="{{ route('account.create', $portfolio) }}"
            @class([
                'col-start-1', 'block',
                'rounded-md', 'bg-white', 'shadow', 'p-4',
                'text-center', 'text-gray-400',
                'border-2', 'border-dashed', 'border-gray-400',
                'hover:border-indigo-700', 'hover:text-indigo-700',
                'transition-all', 'duration-100', 'ease-linear', 'hover:scale-103',
            ])
        >
            <svg width="30" height="30" viewBox="0 0 10 10" fill="none" class="mx-auto">
                <line x1="5" y1="2.5" x2="5" y2="7.5" stroke="currentColor" stroke-width="0.5"/>
                <line x1="2.5" y1="5" x2="7.5" y2="5" stroke="currentColor" stroke-width="0.5"/>
                <circle cx="5" cy="5" r="4" stroke="currentColor" stroke-width="0.5"/>
            </svg>
            <h3>Créer un compte</h3>
        </a>
    </div>

</x-app-layout>
