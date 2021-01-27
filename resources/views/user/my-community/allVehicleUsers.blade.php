<x-app-layout>
    @section('title', $communityName)
        <x-community-nav :communityId="$communityId" :communityName="$communityName" />
        <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class=" font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $communityId . '/vehicle-users') }}">
                {{ __('Verified Vehicle Users') }}
            </a>
        </section>

        <section class="p-3 mb-3 mx-3 mt-10 text-center border-gray-100 border hover:bg-lightblue rounded-full">
            <a class=" font-semibold text-primary w-full flex justify-between"
                href="{{ url('my-community/' . $communityId . '/community-vehicle-users') }}">
                {{ __('Added Vehicle Users') }} 
            </a>
        </section>
</x-app-layout>
