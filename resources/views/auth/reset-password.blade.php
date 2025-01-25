<x-guest-layout>

    <form method="post" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail"/>

            <x-text-input
                id="email"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                class="block mt-1 w-full"
                required autofocus autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Mot de passe"/>

            <x-text-input
                id="password"
                type="password"
                name="password"
                class="block mt-1 w-full"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="block mt-1 w-full"
                required autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
