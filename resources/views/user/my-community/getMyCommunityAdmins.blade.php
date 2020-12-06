<x-app-layout>
    @section('title', $community->communityName)
        <div class="mx-auto py-10 sm:px-6 lg:px-8">
            <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
            <x-session-message />
            <div>
                <div>
                    <h3>Admins</h3>
                    @foreach ($communityAdmins as $admin)
                        <div>
                            <span>{{ $admin->name }} {{ $admin->lastname }} </span>
                            <form method="POST" action="{{ route('community.admin.remove') }}">
                                @csrf
                                <input type="hidden" name="communityAdminId" value="{{ $admin->communityAdminId }}" />
                                <button type="submit">Remove Admin</button>
                            </form>
                            <form method="POST" action="{{ route('community.admin.update') }}">
                                @csrf
                                <input type="hidden" name="communityAdminId" value="{{ $admin->communityAdminId }}" />
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

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit">Edit Roles</button>
                                </div>
                            </form>
                        </div>
                    @endforeach

                </div>

                <h4>Add admin</h4>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
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
            </div>
        </div>
    </x-app-layout>
