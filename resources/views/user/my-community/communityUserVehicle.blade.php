<x-app-layout>
    @section('title', $community->communityName)
        <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
            <div class="md:flex bg-white m-3 rounded-lg border p-6">
                @if ($user->profile_photo_path)
                    <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6"
                        src="{{ $user->profile_photo_path }}" alt="user-photo">
                @else
                    <span
                        class="flex text-primary bg-lightblue font-bold text-2xl justify-center items-center h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6 capitalize">{{ $user->username[0] }}</span>
                @endif
                <div class="flex flex-col items-center justify-center text-center md:text-left">
                    <h2 class="text-lg capitalize">{{ $user->name }} {{ $user->lastname }} &commat;{{ $user->username }}
                    </h2>
                    <div class="flex mt-3 justify-center text-gray-600">
                        <svg class="mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path class="min-w-full"
                                d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" />
                        </svg>
                        <span>{{ $user->user_phone }}</span>
                    </div>
                </div>
            </div>
        @foreach ($vehicles as $vehicle)
            {{$vehicle->vehicleBrand}}
        @endforeach
</x-app-layout>
