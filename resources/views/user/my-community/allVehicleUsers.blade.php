<x-app-layout>
    @section('title', $communityName)
        <x-community-nav :communityId="$communityId" :communityName="$communityName" />
        <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class="text-lg font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $communityId . '/vehicle-users') }}">
                {{ __('Verified Vehicle Users') }} 
                {{-- <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-green-400 text-white">{{ $communityVehicleUsers }}</i> --}}
            </a>
        </section>

        <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class="text-lg font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $communityId . '/community-vehicle-users') }}">
                {{ __('Added Vehicle Users') }} 
                {{-- <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-green-400 text-white">{{ $communityVehicleUsers }}</i> --}}
            </a>
        </section>
</x-app-layout>
