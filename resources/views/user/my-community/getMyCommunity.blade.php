<x-app-layout>
    @section('title', $community->communityName)
            <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
                <div class="p-3 mb-5 border-gray-100">
                    <h3 class="text-center font-bold text-3xl">Identify vehicle User </h3>
                </div>
            <x-vehicle-identify-form :communityId="$community->communityId" :communityName="$community->communityName"/>

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
    </x-app-layout>
