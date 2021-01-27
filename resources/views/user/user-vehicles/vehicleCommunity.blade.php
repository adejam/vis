@php
use App\Http\Controllers\UserVehicleAccessController;
@endphp
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
            @php
            $checkGrantedAccess = UserVehicleAccessController::checkGrantedAccess($community->communityId,
            Auth::id());
            @endphp
            @if ($community->driverLicenseIdAccess || $community->vehicleRegNumAccess || $community->vehicleRegStateAccess)

                <div class="p-3 bg-gray-100 border-gray-300">
                    <h4 class="text-lg font-semibold text-center text-gray-900">
                        Requested Informations
                    </h4>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-3 rounded relative"
                        role="alert">
                        <ul class="flex flex-col text-sm">
                            <li class="mb-1 py-1 px-3 border-b">
                                <p> - Informations you have granted access to are tagged <b>Access Granted</b></p>
                            </li>
                            <li class="mb-1 py-1 px-3 border-b">
                                <p> - Informations with <b>Grant Access</b> Button are new informations requested for</p>
                            </li>
                            <li class="mb-1 py-1 px-3 border-b">
                                <p> - Informations with the <b>Remove Access</b> Button are informations that are no longer
                                    requested for.</p>
                            </li>
                        </ul>
                    </div>
                    <ul class="flex flex-col">
                        @php
                            $text = "Driver's License ID";
                        @endphp
                        <x-show-requirement-access 
                            :accessRequirement="['requiredAccess' => 'driverLicenseIdAccess', 'requirement' => $text, 'accessName' => 'grantDriverLicenseIdAccess']"
                            :communityRequirement="$community->driverLicenseIdAccess"
                            :grantedAccess="$checkGrantedAccess->grantDriverLicenseIdAccess"
                            :communityId="$community->communityId"
                            :userVehicleId="$userVehicleId"/>
                        <x-show-requirement-access 
                            :accessRequirement="['requiredAccess' => 'vehicleRegNumAccess', 'requirement' => 'Vehicle Registration Number', 'accessName' => 'grantVehicleRegNumAccess']"
                            :communityRequirement="$community->vehicleRegNumAccess"
                            :grantedAccess="$checkGrantedAccess->grantVehicleRegNumAccess"
                            :communityId="$community->communityId"
                            :userVehicleId="$userVehicleId"/>
                        <x-show-requirement-access 
                            :accessRequirement="['requiredAccess' => 'vehicleRegStateAccess', 'requirement' => 'Vehicle Registration State', 'accessName' => 'grantVehicleRegStateAccess']"
                            :communityRequirement="$community->vehicleRegStateAccess"
                            :grantedAccess="$checkGrantedAccess->grantVehicleRegStateAccess"
                            :communityId="$community->communityId"
                            :userVehicleId="$userVehicleId"/>
                    </ul>
                </div>
            @endif
        </div>
        <div class="mt-5">
            <h3 class="text-lg font-semibold text-gray-900 my-2 text-center">Admins Lists</h3>
            @foreach ($communityAdmins as $admin)
                <div class="md:flex bg-white m-3 rounded-lg border p-6">
                    @if ($admin->profile_photo_path)
                        <img class="h-20 w-20 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6 object-cover"
                            src="{{ $admin->profile_photo_path }}" alt="admin-photo">
                    @else
                        <span
                            class="flex text-primary bg-lightblue font-bold text-2xl justify-center items-center h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6">{{ strToUpper($admin->username[0]) }}</span>
                    @endif
                    <div class="flex flex-col items-center justify-center text-center md:text-left">
                        <h2 class="text-lg capitalize">{{ $admin->name }} {{ $admin->lastname }}
                            &commat;{{ $admin->username }}
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
            <div class="p-3">
                {{ $communityAdmins->render() }}
            </div>
        </div>
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 sm:px-6">
            <button type="button" data-target="unjoin-community-{{ $userVehicleId }}"
                class="open-modal-button inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                @if ($communityVehicle->verified)
                    Unjoin Community
                @else
                    Cancel Registration request
                @endif
            </button>
            <section id="unjoin-community-{{ $userVehicleId }}" class="modal">
                <div class="modal-content md:max-w-md">
                    <header class="modal-header">
                        <h5 class="modal-title capitalize">Unjoin {{ $community->communityName }}
                        </h5>
                        <button type="button" class="close-modal-button focus:outline-none"
                            data-dismiss="unjoin-community-{{ $userVehicleId }}" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </header>
                    <article class="modal-body">
                        @if ($communityVehicle->verified)
                            <p>
                                Are you sure you want to unjoin this community?
                            </p>
                        @else
                            <p>Are you sure you want to cancen your request to register with this community?</p>
                        @endif

                    </article>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('vehicle.community.unjoin') }}">
                            @csrf
                            <input type="hidden" value="{{ $userVehicleId }}" name="userVehicleId" />
                            <input type="hidden" value="{{ $community->communityId }}" name="communityId" />
                            <input type="hidden" value="{{ $community->communityName }}" name="communityName" />
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                @if ($communityVehicle->verified)
                                    Unjoin Community
                                @else
                                    Cancel Registration request
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </x-app-layout>
