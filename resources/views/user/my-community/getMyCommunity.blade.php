<x-app-layout>
    @section('title', $community->communityName)
        <div class="mx-auto py-10 sm:px-6 lg:px-8">
            <x-session-message />
            <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
            <x-vehicle-identify-form :communityId="$community->communityId" />

            <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                <a class="text-lg font-semibold text-primary w-full inline-block"
                    href="{{ url('my-community/' . $community->communityId . '/vehicle-users') }}">
                    {{ __('Vehicle Users') }}
                </a>
            </section>

            <section class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                <a class="text-lg font-semibold text-primary w-full inline-block"
                    href="{{ url('my-community/' . $community->communityId . '/registration-requests') }}">
                    {{ __('Registration Requests') }}
                </a>
            </section>
        </div>
    </x-app-layout>
