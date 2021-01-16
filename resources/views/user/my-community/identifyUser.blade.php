<x-app-layout>
    @section('title', 'Identify Vehicle')
    <x-community-nav :communityId="$communityId" :communityName="$communityName" />
    <x-vehicle-identify-form :communityId="$communityId" :communityName="$communityName"/>
    @if ($user)
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
                <p>{{ $user->locationInCommunity }}</p>
            </div>
        </div>
        <div class="m-3 p-3 rounded-lg border border-indigo-400">
            <div class="border-b border-gray-100">
                <ul class="flex flex-col">
                    <li class="mb-2 py-3 px-5 border-b bg-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 my-2 text-center capitalize">
                            {{ $user->vehicleBrand }}</h3>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b">
                        <p><b>Vehicle Model: </b>{{ $user->vehicleModel }}</p>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b">
                        <p><b>Vehicle Color: </b>{{ $user->vehicleColor }}</p>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b">
                        <p><b>Driver's License Id: </b>{{ $user->driverLicenseId }}</p>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b">
                        <p><b>Vehicle Reg Number: </b>{{ $user->vehicleRegNum }}</p>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b capitalize">
                        <p><b>Vehicle Reg State: </b>{{ $user->vehicleRegState }}</p>
                    </li>
                    <li class="mb-2 py-3 px-5 border-b">
                        <p><b>Vehicle plate Number: </b>{{ $user->plateNumber }}</p>
                    </li>
                </ul>
            </div>
        </div>
    @else
       <div class="text-center">
        <p>Sorry This vehicle user does not exist in your community</p>
    </div> 
    @endif
    
</x-app-layout>
