<x-guest-layout>

    <div class="mb-4 text-sm text-gray-400">
        Vous avez oublié votre mot de passe ? Pas de problèmes.
        Renseignez votre adresse e-mail et nous vous transmettrons par e-mail un lien
        de réinitialisation qui vous permettra d'en choisir un nouveau.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="post" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Réinitialiser mon mot de passe
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
