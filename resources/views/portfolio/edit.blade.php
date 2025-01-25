<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Modification du portfolio
            <span class="text-indigo-700">{{ $portfolio->name }}</span>
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto space-y-6 pb-6">

        <div class="shadow rounded-md p-6 bg-white">
            <header>
                <h2 class="text-lg font-semibold">Informations du portfolio</h2>
                <p class="mt-1 text-sm text-gray-400">Modifiez les informations du portfolio.</p>
            </header>

            @include('portfolio.partials.form', [
                'action' => route('portfolio.update', $portfolio),
                'method' => 'put',
                'button' => 'Modifier',
                'abort' => route('portfolio.show', $portfolio),
            ])
        </div>

        <div @class(['shadow', 'rounded-md', 'p-6', 'bg-white', 'ring-2', 'ring-red-800'])>
            <header>
                <h2 class="text-lg font-semibold">Archivage du portfolio</h2>
                <p class="mt-1 text-sm text-gray-400">
                    Le portfolio sera archivé.
                    Le portfolio, ses comptes et ses opérations ne pourront plus être consultées.
                    Le portfolio pourra toujours être désarchvé et de nouveau consulté.
                </p>
            </header>

            <form method="post" action="{{ route('portfolio.destroy', $portfolio) }}" class="space-y-6">
                @method('delete')
                @csrf

                <div class="flex items-center gap-6">
                    <x-danger-button>
                        Archiver
                    </x-danger-button>
                    <a href="{{ route('portfolio.show', $portfolio) }}" class="text-indigo-700 underline hover:no-underline">Annuler</a>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
