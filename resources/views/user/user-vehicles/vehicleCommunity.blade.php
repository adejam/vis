<x-app-layout>
    @section('title', 'My community')
    <div class="community-class">
        <div class="bg-white m-3 rounded-lg border p-6">
            <div class="flex flex-col items-center justify-center text-center md:text-left">
                <h2 class="text-lg capitalize font-semibold">{{ $community->communityName }}</h2>
                <div class="flex mt-3 justify-center text-gray-600">
                    <svg class="mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path class="min-w-full"
                            d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                    </svg>
                    <span>{{ $community->communityLocation }}</span>
                </div>
                <div class="flex mt-3 justify-center text-gray-600">
                    {{ $community->aboutCommunity }}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h3 class="text-lg font-semibold text-gray-900 my-2 text-center">Admins Lists</h3>
        @foreach ($communityAdmins as $admin)
    <div class="md:flex bg-white m-3 rounded-lg border p-6">
        @if ($admin->profile_photo_path)
            <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6"
                src="/storage/{{ $admin->profile_photo_path }}" alt="admin-photo">
        @else
            <span
                class="flex text-primary bg-lightblue font-bold text-2xl justify-center items-center h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6">{{ strToUpper($admin->username[0]) }}</span>
        @endif
        <div class="flex flex-col items-center justify-center text-center md:text-left">
            <h2 class="text-lg capitalize">{{ $admin->name }} {{ $admin->lastname }} &commat;{{ $admin->username }}
            </h2>
            <div>
                <x-badge :userId="$community->userId" :authUser="$admin->userId" />
            </div>
            <div class="flex mt-3 justify-center text-gray-600">
                <svg class="mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="min-w-full"
                        d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" />
                </svg>
                <span>{{ $admin->user_phone }}</span>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    
</x-app-layout>
