@php
use App\Http\Controllers\UserVehicleController;
@endphp
<x-app-layout>
    @section('title', 'search community')
    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 sm:px-6">
        <button type="button" data-target="search-community-{{ $userVehicleId }}"
            class="open-modal-button inline-flex items-center px-4 py-2 bg-teal-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Search Communities
        </button>
        <section id="search-community-{{ $userVehicleId }}" class="modal">
            <div class="modal-content md:max-w-md">
                <header class="modal-header">
                    <h5 class="modal-title capitalize">search Communities
                    </h5>
                    <button type="button" class="close-modal-button focus:outline-none"
                        data-dismiss="search-community-{{ $userVehicleId }}"
                        aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </header>
                <form method="GET" action="{{ route('vehicles.community.search') }}">
                    @csrf
                    <input type="hidden" value="{{ $userVehicleId }}" name="userVehicleId" />
                    <article class="modal-body">
                        <x-text-input
                            :input="['value' => '', 'name' => 'search', 'title' => 'Search Community']" />
                    </article>
                    <div class="modal-footer">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            search
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
        @foreach ($communities as $community)
            <div class="bg-white m-3 rounded-lg border p-6">
                <div class="flex flex-col items-center justify-center md:text-left">
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
                    <div class="flex mt-3 justify-center bg-gray-50 text-gray-600">
                        @php
                        $alreadyRegistered = UserVehicleController::checkIfVehicleAlreadyRegistered($community->communityId,
                        $userVehicleId);
                        @endphp
                        @if ($alreadyRegistered)
                            <div class="text-center p-3">
                                @if ($alreadyRegistered->verified)
                                    <p>Already Registered with this community</p>
                                @else
                                    <p>Registration Request Sent</p>
                                @endif

                            </div>
                        @else

                            <button type="button" data-target="search-community-{{ $community->communityId }}"
                                class="open-modal-button inline-flex items-center mt-3 px-4 py-2 bg-teal-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                send request
                            </button>
                            <section id="search-community-{{ $community->communityId }}" class="modal">
                                <div class="modal-content md:max-w-md">
                                    <header class="modal-header">
                                        <h5 class="modal-title capitalize">Send Registration Request
                                        </h5>
                                        <button type="button" class="close-modal-button focus:outline-none"
                                            data-dismiss="search-community-{{ $community->communityId }}"
                                            aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                        </button>
                                    </header>
                                    <form method="POST" action="{{ route('vehicle.community.join') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $community->communityId }}" name="communityId" />
                                        <input type="hidden" value="{{ $userVehicleId }}" name="userVehicleId" />
                                        <input type="hidden" value="{{ $community->driverLicenseIdAccess }}" name="driverLicenseIdAccess" />
                                        <input type="hidden" value="{{ $community->vehicleRegNumAccess }}" name="vehicleRegNumAccess" />
                                        <input type="hidden" value="{{ $community->vehicleRegStateAccess}}" name="vehicleRegStateAccess" />

                                        <article class="modal-body">
                                            @if ($community->driverLicenseIdAccess || $community->vehicleRegNumAccess || $community->vehicleRegStateAccess)
                                                <div class="">
                                                    <div class="py-3 m-3 relative">
                                                        <p>This community vehicle requirements includes the following
                                                            informations.</p>
                                                        <ul class="flex flex-col">
                                                            @if ($community->driverLicenseIdAccess)
                                                                <li class="relative block py-3 px-5 text-left">- Driver's
                                                                    License ID </li>
                                                            @endif
                                                            @if ($community->vehicleRegNumAccess)
                                                                <li class="relative block py-3 px-5 ">- Vehicle Registration
                                                                    Number </li>
                                                            @endif
                                                            @if ($community->vehicleRegStateAccess)
                                                                <li class="relative block py-3 px-5 ">- Vehicle Registration
                                                                    State </li>
                                                            @endif
                                                        </ul>
                                                        <p>
                                                            By sending a request to join, you have agreed to grant them
                                                            access to these informations
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            <x-text-input
                                                :input="['value' => '', 'name' => 'locationInCommunity', 'title' => 'Your Location in Community']" />

                                            @if ($community->driverLicenseIdAccess || $community->vehicleRegNumAccess || $community->vehicleRegStateAccess)
                                                <div class="p-3 bg-gray-100 border-gray-300">
                                                    @if ($community->driverLicenseIdAccess && !$userVehicle->driverLicenseId)
                                                        <x-text-input
                                                            :input="['value' => '', 'name' => 'driverLicenseId', 'title' => 'Driver License ID']" />
                                                    @endif
                                                    @if ($community->vehicleRegNumAccess && !$userVehicle->vehicleRegNum)
                                                        <x-text-input
                                                            :input="['value' => '', 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                                                    @endif
                                                    @if ($community->vehicleRegStateAccess && !$userVehicle->vehicleRegState)
                                                        <x-text-input
                                                            :input="['value' => '', 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                                                    @endif
                                                </div>
                                            @endif
                                        </article>
                                        <div class="modal-footer">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                Join
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="p-3">
            {{ $communities->render() }}
        </div>

        <div class="mt-2">
            <a href="{{ url('my-vehicles/' . $userVehicleId . '/'. $userVehicle->vehicleBrand) }}">
                                
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                <div>back to {{$userVehicle->vehicleBrand}}</div>

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
