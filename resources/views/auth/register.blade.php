<x-guest-layout>
    @section('title', 'Register')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('communivis-logo.png') }}" class="block h-9 w-auto" alt="communivis-logo" />
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Firstname') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                    :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div>
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username"
                    :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div>
                <x-jet-label for="user_phone" value="{{ __('Phone Number') }}" />
                <x-jet-input id="user_phone" class="block mt-1 w-full" type="text" name="user_phone"
                    :value="old('user_phone')" required autofocus autocomplete="user_phone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs mt-3">
            &copy;{{ date('Y') }} Adeleye jamiu. All rights reserved.
        </p>
    </x-jet-authentication-card>
</x-guest-layout>
