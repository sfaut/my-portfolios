<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Création de compte</h2>

        <div class="text-sm text-gray-400">
            ➜ Portfolio
            <a href="{{ route('portfolio.show', $portfolio) }}" class="text-indigo-400 underline hover:no-underline">{{ $portfolio->name }}</a>
        </div>
    </x-slot>

    @include('account.partials.form', [
        'action' => route('account.store', $portfolio),
        'method' => 'post',
        'button' => 'Créer',
        'abort' => route('portfolio.show', $portfolio),
    ])

</x-app-layout>
