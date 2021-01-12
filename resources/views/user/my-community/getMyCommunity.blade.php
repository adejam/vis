<x-app-layout>
    @section('title', $community->communityName)
        <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
        <div class="p-3 mb-5 border-gray-100">
            <h3 class="text-center font-bold text-3xl">Identify vehicle User </h3>
        </div>
        <x-vehicle-identify-form :communityId="$community->communityId" :communityName="$community->communityName" />

        <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class="text-lg font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $community->communityId . '/vehicle-users') }}">
                {{ __('Vehicle Users') }} 
                <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-green-400 text-white">{{ $communityVehicleUsers }}</i>
            </a>
        </section>

        <section class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class="text-lg font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $community->communityId . '/registration-requests') }}">
                {{ __('Registration Requests') }}
                @if ($registrationRequests)
                <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-red-400 text-white">{{ $registrationRequests }}</i>
                @endif
            </a>
        </section>
    </x-app-layout>
