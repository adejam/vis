<x-app-layout>
    @section('title', $community->communityName)
        <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
        <div class="md:flex bg-white m-3 rounded-lg border p-6">
            @if ($user->profile_photo_path)
                <img class="h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6 object-cover"
                    src="{{ $user->profile_photo_path }}" alt="user-photo">
            @else
                <span
                    class="flex text-primary bg-lightblue font-bold text-2xl justify-center items-center h-16 w-16 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6 capitalize">{{ $user->username[0] }}</span>
            @endif
            <div class="flex flex-col items-center justify-center text-center md:text-left">
                <h2 class="text-xl font-bold capitalize">{{ $user->name }} {{ $user->lastname }}
                </h2>
                <article>
                    <h3 class="text-lg font-semibold capitalize">&commat;{{ $user->username }}</h3>
                </article>
                <div class="flex mt-3 justify-center text-gray-600">
                    <svg class="mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="min-w-full"
                            d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" />
                    </svg>
                    <span>{{ $user->user_phone }}</span>
                </div>
                <div class="flex mt-3 justify-center text-gray-600">
                    <svg class="mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path class="min-w-full"
                            d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                    </svg>
                    <span>{{ $user->locationInCommunity }}</span>
                </div>
                @if ($community->driverLicenseIdAccess)

                    <p><b>Driver's License Id: </b>{{ $user->driverLicenseId }}</p>

                @endif
                <div class="flex mt-3 justify-center flex-wrap text-gray-600">
                    <section class="mr-2">
                        <button type="button" data-target="delete-user-modal"
                            class="open-modal-button  inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path class="fill-current min-w-full"
                                    d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z" />
                            </svg>
                        </button>
                        <x-modal modalId="delete-user-modal" :modalTitle="'Delete '.$user->name">
                            <form action="{{ route('community.delete.userAndVehicle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                                <input type="hidden" name="username" value="{{ $user->username }}" />
                                <article class="modal-body text-gray-600">
                                    <p>
                                        Deleting a user will delete all vehicles too
                                        <br />
                                        Are you sure you want to delete this user?
                                    </p>

                                </article>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Delete
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                    <section class="mr-2">
                        <button type="button" data-target="edit-user-modal"
                            class="open-modal-button  inline-flex items-center px-2 py-1 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path class="fill-current min-w-full"
                                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                            </svg>
                        </button>
                        <x-modal modalId="edit-user-modal" :modalTitle="'Edit '.$user->name">
                            <form action="{{ route('community.edit.vehicleUser') }}" method="POST">
                                @csrf
                                <article class="modal-body text-gray-600">
                                    <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                                    <input type="hidden" name="username" value="{{ $user->username }}" />
                                    <input type="hidden" value="{{ $community->driverLicenseIdAccess }}"
                                        name="driverLicenseIdAccess" />
                                    <x-text-input
                                        :input="['value' => $user->name, 'name' => 'name', 'title' => 'Firstname']" />
                                    <x-text-input
                                        :input="['value' => $user->lastname, 'name' => 'lastname', 'title' => 'Lastname']" />
                                    <x-text-input
                                        :input="['value' => $user->user_phone, 'name' => 'user_phone', 'title' => 'User Phone Number']" />
                                    <x-text-input
                                        :input="['value' => $user->locationInCommunity, 'name' => 'locationInCommunity', 'title' => 'Location in Community']" />
                                    @if ($community->driverLicenseIdAccess)
                                        <x-text-input
                                            :input="['value' => $user->driverLicenseId, 'name' => 'driverLicenseId', 'title' => 'Driver License ID']" />
                                    @endif
                                </article>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    </section>

                    <section class="mr-2" aria-label="Edit User Pic">
                        <button type="button" data-target="edit-user-pic-modal"
                            class="open-modal-button  inline-flex items-center px-2 py-1 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path class="fill-current min-w-full"
                                    d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z" />
                            </svg>
                        </button>
                        <x-modal modalId="edit-user-pic-modal" :modalTitle="'Edit '.$user->name.' Photo'">
                            <form enctype="multipart/form-data" action="{{ route('community.edit.vehicleUserPhoto') }}"
                                method="POST">
                                @csrf
                                <article class="modal-body text-gray-600">
                                    <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                                    <input type="hidden" name="username" value="{{ $user->username }}" />
                                    <div>
                                        <x-jet-label for="photo" value="{{ __('User Photo') }}" />
                                        <x-jet-input id="photo" class="block mt-1 w-full" type="file" :value="old('photo')"
                                            name="photo" />
                                    </div>
                                </article>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                    <section>
                        <button type="button" data-target="add-user-vehicle-modal"
                            class="open-modal-button inline-flex items-center px-2 py-1 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path class="fill-current min-w-full"
                                    d="M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z" />
                            </svg>
                        </button>
                        <x-modal modalId="add-user-vehicle-modal" :modalTitle="'Add '.$user->name.' Vehicle'">
                            <form action="{{ route('community.add.userVehicle') }}" method="POST">
                                @csrf
                                <article class="modal-body text-gray-600">
                                    <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                                    <input type="hidden" name="username" value="{{ $user->username }}" />
                                    <x-text-input
                                        :input="['value' => '', 'name' => 'vehicleBrand', 'title' => 'Vehicle Brand']" />
                                    <x-text-input
                                        :input="['value' => '', 'name' => 'vehicleModel', 'title' => 'Vehicle Model']" />
                                    <x-text-input
                                        :input="['value' => '', 'name' => 'vehicleColor', 'title' => 'Vehicle Colour']" />
                                    <x-text-input
                                        :input="['value' => '', 'name' => 'plateNumber', 'title' => 'Plate Number']" />
                                    @if ($community->vehicleRegNumAccess)
                                        <x-text-input
                                            :input="['value' => '', 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                                    @endif
                                    @if ($community->vehicleRegStateAccess)
                                        <x-text-input
                                            :input="['value' => '', 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                                    @endif
                                </article>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Add Vehicle
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    </section>


                </div>
            </div>
        </div>
        @foreach ($vehicles as $vehicle)
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
                        @if ($community->vehicleRegNumAccess)
                            <li class="mb-2 py-3 px-5 border-b">
                                <p><b>Vehicle Registration Number: </b>{{ $vehicle->vehicleRegNum }}</p>
                            </li>
                        @endif
                        @if ($community->vehicleRegStateAccess)
                            <li class="mb-2 py-3 px-5 border-b capitalize">
                                <p><b>Vehicle Registration State: </b>{{ $vehicle->vehicleRegState }}</p>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="flex justify-between">
                    <div>
                        <button type="button" data-target="edit-vehicle-modal-{{ $vehicle->communityUserVehicleId }}"
                            class="open-modal-button inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit Vehicle
                        </button>
                        <section id="edit-vehicle-modal-{{ $vehicle->communityUserVehicleId }}" class="modal">
                            <div class="modal-content md:max-w-md">
                                <header class="modal-header">
                                    <h5 class="modal-title">Edit {{ $vehicle->vehicleBrand }}</h5>
                                    <button type="button" id="close-modal" class="close-modal-button"
                                        data-dismiss="edit-vehicle-modal-{{ $vehicle->communityUserVehicleId }}"
                                        aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                    </button>
                                </header>
                                <form method="POST" action="{{ route('community.edit.userVehicle') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $vehicle->communityUserVehicleId }}"
                                        name="communityUserVehicleId" />
                                    <input type="hidden" name="communityId" value="{{ $vehicle->communityId }}" />
                                    <input type="hidden" value="{{ $community->vehicleRegNumAccess }}"
                                        name="vehicleRegNumAccess" />
                                    <input type="hidden" value="{{ $community->vehicleRegStateAccess }}"
                                        name="vehicleRegStateAccess" />
                                    <article class="modal-body text-gray-600">
                                        <div class="overflow-hidden sm:rounded-md bg-gray-300 p-5">
                                            <x-text-input
                                                :input="['value' => $vehicle->vehicleBrand, 'name' => 'vehicleBrand', 'title' => 'Vehicle Brand']" />
                                            <x-text-input
                                                :input="['value' => $vehicle->vehicleModel, 'name' => 'vehicleModel', 'title' => 'Vehicle Model']" />
                                            <x-text-input
                                                :input="['value' => $vehicle->vehicleColor, 'name' => 'vehicleColor', 'title' => 'Vehicle Colour']" />
                                            <x-text-input
                                                :input="['value' => $vehicle->plateNumber, 'name' => 'plateNumber', 'title' => 'Plate Number']" />
                                            @if ($community->vehicleRegNumAccess)
                                                <x-text-input
                                                    :input="['value' => $vehicle->vehicleRegNum, 'name' => 'vehicleRegNum', 'title' => 'Vehicle Registration Number']" />
                                            @endif
                                            @if ($community->vehicleRegStateAccess)
                                                <x-text-input
                                                    :input="['value' => $vehicle->vehicleRegState, 'name' => 'vehicleRegState', 'title' => 'Vehicle Registration State']" />
                                            @endif
                                        </div>
                                    </article>
                                    <div class="modal-footer">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Edit
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div method="POST" action="{{ route('community.user.remove-vehicle') }}" class="mr-2">
                        <button type="button" data-target="delete-vehicle-modal-{{ $vehicle->communityUserVehicleId }}"
                            class="open-modal-button inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Remove Vehicle
                        </button>
                        <section id="delete-vehicle-modal-{{ $vehicle->communityUserVehicleId }}" class="modal">
                            <div class="modal-content md:max-w-md">
                                <header class="modal-header">
                                    <h5 class="modal-title">Remove {{ $vehicle->vehicleBrand }}</h5>
                                    <button type="button" id="close-modal" class="close-modal-button"
                                        data-dismiss="delete-vehicle-modal-{{ $vehicle->communityUserVehicleId }}"
                                        aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                    </button>
                                </header>
                                <form method="POST" action="{{ route('community.delete.userVehicle') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $vehicle->communityUserVehicleId }}"
                                        name="communityUserVehicleId" />
                                    <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                                    <input type="hidden" name="username" value="{{ $user->username }}" />
                                    <article class="modal-body text-gray-600">
                                        <p>
                                            Deleting the last vehicle of a user will delete the user too.
                                            <br />
                                            Are you sure you want to delete this vehicle?
                                        </p>

                                    </article>
                                    <div class="modal-footer">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Delete
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </section>

                    </div>
                </div>


            </div>
        @endforeach
    </x-app-layout>
