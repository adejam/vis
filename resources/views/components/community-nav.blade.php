@php
use App\Http\Controllers\CommunityAdminController;
@endphp
<div class=" mb-5 border-gray-100">
    <h3 class="text-center font-bold text-3xl capitalize">{{ $communityName }}</h3>
</div>
<ul class="border-b border-gray-100 mb-0 justify-center  text-primary flex flex-wrap">
    <li class="" style="margin-bottom: -1px;">
        <a href="{{ url('my-community/' . $communityId) }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Main</a>
    </li>
    <li class="" style="margin-bottom: -1px;">
        <a href="{{ url('my-community/' . $communityId . '/admins') }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get.admins') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Admins</a>
    </li>
    <li class="" style="margin-bottom: -1px;">
        <a href="{{ url('my-community/' . $communityId . '/settings') }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get.settings') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Settings</a>
    </li>
    <li class="" style="margin-bottom: -1px; margin-top:5px;">
        <button type="button" data-target="add-vehicle-modal"
            class="open-modal-button inline-flex items-center px-2 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Add Vehicle
        </button>

        <section id="add-vehicle-modal" class="modal">
            <div class="modal-content md:max-w-md">
                <header class="modal-header">
                    <h5 class="modal-title">Add vehicle</h5>
                    <button type="button" id="close-modal" class="close-modal-button" data-dismiss="add-vehicle-modal"
                        aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </header>
                <form method="POST" action="{{ route('community.add.userAndVehicle') }}">
                    <article class="modal-body text-gray-600">
                            <div class="overflow-hidden sm:rounded-md bg-gray-300 p-5">
                                <x-text-input :input="['value' => '', 'name' => 'name', 'title' => 'Firstname']" />
                                <x-text-input :input="['value' => '', 'name' => 'lastname', 'title' => 'Lastname']" />
                                <x-text-input :input="['value' => '', 'name' => 'vehicleColor', 'title' => 'userPhone']" />
                                <x-text-input
                                    :input="['value' => '', 'name' => 'locationInCommunity', 'title' => 'Location in Community']" />
                                <x-text-input :input="['value' => '', 'name' => 'vehicleBrand', 'title' => 'Vehicle Brand']" />
                                <x-text-input :input="['value' => '', 'name' => 'vehicleModel', 'title' => 'Vehicle Model']" />
                                <x-text-input :input="['value' => '', 'name' => 'vehicleColor', 'title' => 'Vehicle Colour']" />
                                <x-text-input :input="['value' => '', 'name' => 'plateNumber', 'title' => 'Plate Number']" />
                                    @php
                                    $community =
                                    CommunityAdminController::getCommunityWithAccess($communityId);
                                    @endphp
                                        @if ($community->driverLicenseIdAccess)
                                            <x-text-input
                                                :input="['value' => '', 'name' => 'driverLicenseId', 'title' => 'Driver License ID']" />
                                        @endif
                                        @if ($community->vehicleRegNumAccess)
                                            <x-text-input
                                                :input="['value' => '', 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                                        @endif
                                        @if ($community->vehicleRegStateAccess)
                                            <x-text-input
                                                :input="['value' => '', 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                                        @endif
                            </div>
                    </article>
                    <div class="modal-footer">

                        @csrf
                        <input type="hidden" name="communityId" value={{ $communityId }} />
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Submit
                        </button>

                    </div>
                </form>
            </div>
        </section>
    </li>
</ul>
