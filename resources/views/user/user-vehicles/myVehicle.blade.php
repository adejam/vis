<x-app-layout>
    @section('title', $vehicle->vehicleBrand)
        <div class="vehicle-class">
            <section class="rounded-lg border border-indigo-400 mb-10 p-3">
                <div class="">
                    <div class="p-4 bg-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 text-center capitalize">{{ $vehicle->vehicleBrand }}
                        </h3>
                    </div>
                    <div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 sm:px-6">
                            <button type="button" data-target="search-community-{{ $vehicle->userVehicleId }}"
                                class="open-modal-button inline-flex items-center px-4 py-2 bg-teal-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Search Communities
                            </button>
                            <section id="search-community-{{ $vehicle->userVehicleId }}" class="modal">
                                <div class="modal-content md:max-w-md">
                                    <header class="modal-header">
                                        <h5 class="modal-title capitalize">search Communities
                                        </h5>
                                        <button type="button" class="close-modal-button focus:outline-none"
                                            data-dismiss="search-community-{{ $vehicle->userVehicleId }}"
                                            aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                        </button>
                                    </header>
                                    <form method="GET" action="{{ route('vehicles.community.search') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
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
                            <div>
                                <a
                                    href="{{ url('my-vehicles/' . $vehicle->vehicleBrand . '/' . $vehicle->userVehicleId . '/community/' . $community->communityName . '/' . $community->communityId) }}">
                                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>View <span class="capitalize">{{ $community->communityName }}</span>
                                        </div>

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
                        @endforeach

                    </div>
                </div>
                <div class="mt-5">
                    <form method="POST" action="{{ route('vehicle.update') }}">
                        @csrf
                        <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                        <div class="overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <x-text-input
                                    :input="['value' => $vehicle->vehicleBrand, 'name' => 'vehicleBrand', 'title' => 'Vehicle Brand']" />
                                <x-text-input
                                    :input="['value' => $vehicle->vehicleModel, 'name' => 'vehicleModel', 'title' => 'Vehicle Model']" />
                                <x-text-input
                                    :input="['value' => $vehicle->vehicleColor, 'name' => 'vehicleColor', 'title' => 'Vehicle Colour']" />
                                <x-text-input
                                    :input="['value' => $vehicle->driverLicenseId, 'name' => 'driverLicenseId', 'title' => 'Driver License Id']" />
                                <x-text-input
                                    :input="['value' => $vehicle->vehicleRegNum, 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                                <x-text-input
                                    :input="['value' => $vehicle->vehicleRegState, 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                                <x-text-input
                                    :input="['value' => $vehicle->plateNumber, 'name' => 'plateNumber', 'title' => 'Plate Number']" />

                            </div>
                            <div class="flex items-center justify-end px-4 py-3 sm:px-6">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Update Vehicle
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 sm:px-6">
                        <button type="button" data-target="delete-vehicle-{{ $vehicle->userVehicleId }}"
                            class="open-modal-button inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Delete Vehicle
                        </button>
                    </div>
                    <section id="delete-vehicle-{{ $vehicle->userVehicleId }}" class="modal">
                        <div class="modal-content md:max-w-md">
                            <header class="modal-header">
                                <h5 class="modal-title capitalize">Delete {{ $vehicle->vehicleBrand }}
                                </h5>
                                <button type="button" class="close-modal-button focus:outline-none"
                                    data-dismiss="delete-vehicle-{{ $vehicle->userVehicleId }}" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                            </header>
                            <article class="modal-body">
                                <p>
                                    Are you sure you want to delete your Vehicle? Once your vehicle is deleted, It
                                    will be permanently removed from all registered communities.
                                </p>
                            </article>
                            <div class="modal-footer">
                                <form method="POST" action="{{ route('vehicle.delete') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Delete Vehicle
                                    </button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </x-app-layout>
