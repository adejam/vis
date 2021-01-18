<x-app-layout>
    @section('title', 'My-Vehicles')
        <div>
            @foreach ($userVehicles as $vehicle)
            <section class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                <a class="text-lg font-semibold text-primary w-full inline-block"
                    href="{{ url('my-vehicles/' . $vehicle->userVehicleId .'/'. $vehicle->vehicleBrand) }}">
                    {{ __($vehicle->vehicleBrand) }}
                </a>
            </section>
            @endforeach
        </div>
        <section class="mt-10">
            <div class="">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-semibold text-gray-900 text-center">Add Vehicle</h3>
                </div>
            </div>


            <div class="mt-5 md:mt-0">
                <form method="POST" action="{{ route('vehicle.add') }}">
                    @csrf
                    <div class="overflow-hidden sm:rounded-md">
                        <x-text-input :input="['value' => '', 'name' => 'vehicleBrand', 'title' => 'Vehicle Brand']" />
                        <x-text-input :input="['value' => '', 'name' => 'vehicleModel', 'title' => 'Vehicle Model']" />
                        <x-text-input :input="['value' => '', 'name' => 'vehicleColor', 'title' => 'Vehicle Colour']" />
                        <x-text-input :input="['value' => '', 'name' => 'plateNumber', 'title' => 'Plate Number']" />
                        {{-- <div class="p-3 bg-gray-100 border-gray-300">
                            <div class="flex justify-between items-start bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-3 rounded relative" role="alert">
                                <p class="block sm:inline">This vehicle has been registered with a community. You have to unregister this vehicle from
                                    all communities to be able to adit vehicle's details.
                                </p>
                            </div>
                            <x-text-input
                                :input="['value' => '', 'name' => 'driverLicenseId', 'title' => 'Driver License Id']" />
                            <x-text-input
                                :input="['value' => '', 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                            <x-text-input
                                :input="['value' => '', 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                        
                        </div> --}}
                        
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </x-app-layout>
