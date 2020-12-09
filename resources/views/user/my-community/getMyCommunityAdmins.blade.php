<x-app-layout>
    @section('title', $community->communityName)
        <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
        <div>
            <div>
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
                            <h2 class="text-lg">{{ $admin->name }} {{ $admin->lastname }} &commat;{{ $admin->username }}
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
                            <div class="flex items-center justify-around px-4 py-3 bg-gray-50 sm:px-6">
                                <button type="button" data-target="edit-admin-modal-{{ $admin->communityAdminId }}"
                                    class="open-modal-button inline-flex items-center mr-4 px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                                <button type="button" data-target="delete-admin-modal-{{ $admin->communityAdminId }}"
                                    class="open-modal-button inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Remove
                                </button>
                                <section id="delete-admin-modal-{{ $admin->communityAdminId }}" class="modal">
                                    <div class="modal-content md:max-w-md">
                                        <header class="modal-header">
                                            <h5 class="modal-title">Delete {{ $admin->name }} {{ $admin->lastname }}</h5>
                                            <button type="button" class="close-modal-button focus:outline-none"
                                                data-dismiss="delete-admin-modal-{{ $admin->communityAdminId }}"
                                                aria-label="Close">
                                                <span aria-hidden="true">X</span>
                                            </button>
                                        </header>
                                        <article class="modal-body">
                                            <p class="text-center">
                                                Are you sure you want to Remove {{ $admin->name }} {{ $admin->lastname }} as
                                                admin?
                                            </p>
                                        </article>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{ route('community.admin.remove') }}">
                                                @csrf
                                                <input type="hidden" name="communityAdminId"
                                                    value={{ $admin->communityAdminId }} />
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                    Delete Admin
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <section id="edit-admin-modal-{{ $admin->communityAdminId }}" class="modal">
                                    <div class="modal-content md:max-w-md">
                                        <header class="modal-header">
                                            <h5 class="modal-title">Edit {{ $admin->name }} {{ $admin->lastname }}'s Roles
                                            </h5>
                                            <button type="button" class="close-modal-button focus:outline-none"
                                                data-dismiss="edit-admin-modal-{{ $admin->communityAdminId }}"
                                                aria-label="Close">
                                                <span aria-hidden="true">X</span>
                                            </button>
                                        </header>
                                        <form method="POST" action="{{ route('community.admin.update') }}">
                                            <article class="modal-body">
                                                @csrf
                                                <input type="hidden" name="communityAdminId"
                                                    value="{{ $admin->communityAdminId }}" />
                                                <input type="hidden" name="username" value="{{ $admin->username }}" />
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->verifyUser)
                                                            <input type="checkbox" name="verifyUser" checked />
                                                        @else
                                                            <input type="checkbox" name="verifyUser" />
                                                        @endif

                                                        verify user role
                                                    </label>
                                                    @if ($errors->has('verifyUser'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('verifyUser') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->removeUserVehicle)
                                                            <input type="checkbox" name="removeUserVehicle" checked />
                                                        @else
                                                            <input type="checkbox" name="removeUserVehicle" />
                                                        @endif
                                                        remove user vehicle role
                                                    </label>
                                                    @if ($errors->has('removeUserVehicle'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('removeUserVehicle') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->removeAdmin)
                                                            <input type="checkbox" name="removeAdmin" checked />
                                                        @else
                                                            <input type="checkbox" name="removeAdmin" />
                                                        @endif
                                                        remove admin role
                                                    </label>
                                                    @if ($errors->has('removeAdmin'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('removeAdmin') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->addAdmin)
                                                            <input type="checkbox" name="addAdmin" checked />
                                                        @else
                                                            <input type="checkbox" name="addAdmin" />
                                                        @endif
                                                        Add admin role
                                                    </label>
                                                    @if ($errors->has('addAdmin'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('addAdmin') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->editAdminRoles)
                                                            <input type="checkbox" name="editAdminRoles" checked />
                                                        @else
                                                            <input type="checkbox" name="editAdminRoles" />
                                                        @endif
                                                        edit admin roles role
                                                    </label>
                                                    @if ($errors->has('editAdminRoles'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('editAdminRoles') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label class="form-check-label">
                                                        @if ($admin->identifyVehicleUser)
                                                            <input type="checkbox" name="identifyVehicleUser" checked />
                                                        @else
                                                            <input type="checkbox" name="identifyVehicleUser" />
                                                        @endif
                                                        identify admin roles role
                                                    </label>
                                                    @if ($errors->has('identifyVehicleUser'))
                                                        <span class="help-block alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('identifyVehicleUser') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </article>
                                            <div class="modal-footer">
                                                    @csrf
                                                    <input type="hidden" name="communityAdminId"
                                                        value={{ $admin->communityAdminId }} />
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                        Edit Admin Roles
                                                    </button>

                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            @if ($community->addAdmin)
                <h4>Add admin</h4>
                <form method="POST" action="{{ route('community.admin.add') }}">
                    @csrf
                    <input type="hidden" name="communityId" value="{{ $community->communityId }}" />
                    <div class="col-span-6 sm:col-span-4">
                        <input type="number" name="id" placeholder="user id" />
                        @if ($errors->has('id'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="username" placeholder="user name" />
                        @if ($errors->has('username'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="verifyUser" />
                            verify user role
                        </label>
                        @if ($errors->has('verifyUser'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('verifyUser') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="removeUserVehicle" />
                            remove user vehicle role
                        </label>
                        @if ($errors->has('removeUserVehicle'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('removeUserVehicle') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="removeAdmin" />
                            remove admin role
                        </label>
                        @if ($errors->has('removeAdmin'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('removeAdmin') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="addAdmin" />
                            Add admin role
                        </label>
                        @if ($errors->has('addAdmin'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('addAdmin') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="editAdminRoles" />
                            edit admin roles role
                        </label>
                        @if ($errors->has('editAdminRoles'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('editAdminRoles') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="form-check-label">
                            <input type="checkbox" name="identifyVehicleUser" />
                            identify vehicle user
                        </label>
                        @if ($errors->has('identifyVehicleUser'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('identifyVehicleUser') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            @endif
        </div>
    </x-app-layout>
