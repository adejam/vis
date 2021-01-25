@php
use App\Http\Controllers\UserVehicleAccessController;
$checkGrantedAccess = UserVehicleAccessController::checkGrantedAccess($community->communityId, $user->id);
@endphp
<x-app-layout>
    @section('title', 'Community vehicles')
        <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
        <div class="vehicle-class">
            <div class="">
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
                        @if ($community->driverLicenseIdAccess && $checkGrantedAccess->grantDriverLicenseIdAccess)
                            
                                <p><b>Driver's License Id: </b>{{ $user->driverLicenseId }}</p>
                         
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @foreach ($communityUserVehicles as $vehicle)
            <div class="m-3 p-3 rounded-lg border border-indigo-400">
                <div class="border-b border-gray-100">
                    <ul class="flex flex-col">
                        <li class="mb-2 py-3 px-5 border-b bg-gray-100">
                            <h3 class="text-lg font-semibold text-gray-900 my-2 text-center capitalize">
                                {{ $vehicle->vehicleBrand }}
                            </h3>
                        </li>
                        <li class="mb-2 py-3 px-5 border-b">
                            <p><b>Vehicle Model: </b>{{ $vehicle->vehicleModel }}</p>
                        </li>
                        <li class="mb-2 py-3 px-5 border-b">
                            <p><b>Vehicle Color: </b>{{ $vehicle->vehicleColor }}</p>
                        </li>
                        <li class="mb-2 py-3 px-5 border-b">
                            <p><b>Vehicle plate Number: </b>{{ $vehicle->plateNumber }}</p>
                        </li>
                        {{-- @php
                        $checkGrantedAccess = UserVehicleAccessController::checkGrantedAccess($community->communityId,
                        $user->userId);
                        @endphp --}}
                        {{-- @if ($community->driverLicenseIdAccess && $checkGrantedAccess->grantDriverLicenseIdAccess)
                            <li class="mb-2 py-3 px-5 border-b">
                                <p><b>Driver's License Id: </b>{{ $vehicle->driverLicenseId }}</p>
                            </li>     
                        @endif --}}
                        @if ($community->vehicleRegNumAccess && $checkGrantedAccess->grantVehicleRegNumAccess)
                            <li class="mb-2 py-3 px-5 border-b">
                                <p><b>Vehicle Registration Number: </b>{{ $vehicle->vehicleRegNum }}</p>
                            </li>
                        @endif
                        @if ($community->vehicleRegStateAccess && $checkGrantedAccess->grantVehicleRegStateAccess)
                            <li class="mb-2 py-3 px-5 border-b capitalize">
                                <p><b>Vehicle Registration State: </b>{{ $vehicle->vehicleRegState }}</p>
                            </li>
                        @endif
                        <li class="mb-2 py-3 px-5 text-center border-b">
                            <p>Located at {{ $vehicle->locationInCommunity }}</p>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-between">
                    <form method="POST" action="{{ route('community.user.remove-vehicle') }}" class="mr-2">
                        @csrf
                        <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                        <input type="hidden" name="communityId" value="{{ $vehicle->communityId }}" />
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            @if ($vehicle->verified)
                                Remove Vehicle
                            @else
                                Reject request
                            @endif
                        </button>

                    </form>
                    @if (!$vehicle->verified)
                        <form method="POST" action="{{ route('community.user.verify-user') }}">
                            @csrf
                            <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                            <input type="hidden" name="communityId" value="{{ $vehicle->communityId }}" />
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Verify Vehicle
                            </button>
                        </form>
                    @endif
                </div>


            </div>
        @endforeach

        <div class="mt-2">
            <a href="{{ url('my-community/' . $community->communityId . '/registration-requests') }}">

                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Go to Registration Requests</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        <div class="mt-2">
            <a href="{{ url('my-community/' . $community->communityId . '/vehicle-users') }}">

                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Check Community Vehicle Users</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </x-app-layout>
