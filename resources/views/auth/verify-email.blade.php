<x-guest-layout>
    @section('title', 'verify-Email')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('communivis-logo.png') }}" class="block h-9 w-auto" alt="communivis-logo" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
        <p class="text-center text-gray-500 text-xs mt-3">
            &copy;2020 Adeleye jamiu. All rights reserved.
        </p>
    </x-jet-authentication-card>
</x-guest-layout>
