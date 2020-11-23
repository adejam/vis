<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jamo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        form {
            border-bottom: 1px solid black;
            margin-bottom: 50px;
        }

        .alert {
            padding: 10px;
        }

        .alert-danger {
            background-color: #e93434;
            color: #af0a0a;
        }

        .alert-success {
            background-color: #12d812;
            color: #047404;
        }

    </style>
</head>

<body>
    <div>
        <h4>Update</h4>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('community.update') }}">
            @csrf
            <input type="hidden" name="communityId" value={{ $community->communityId }} />
            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="communityName" value={{ $community->communityName }} />
                @if ($errors->has('communityName'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('communityName') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="communityLocation" value={{ $community->communityLocation }} />
                @if ($errors->has('communityLocation'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('communityLocation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <textarea class="form-control" value="{{ $community->aboutCommunity }}" id="aboutCommunity" rows="3"
                    name="aboutCommunity">{{ $community->aboutCommunity }}</textarea>
                @if ($errors->has('aboutCommunity'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('aboutCommunity') }}</strong>
                    </span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit">Update</button>
            </div>
        </form>
        <form method="POST" action="{{ route('community.delete') }}">
            @csrf
            <input type="hidden" name="communityId" value={{ $community->communityId }} />
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="alert alert-danger">delete</button>
            </div>
        </form>
    </div>

    <div>
        <div>
            <h3>Admins</h3>
            @foreach ($communityAdmins as $admin)
                <div>
                    <span>{{ $admin->name }} {{ $admin->lastname }} </span>
                    <button>remove admin</button> <button>Edit roles</button>
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
                    <input type="checkbox" name="editUserVehicle" />
                    edit user vehicle role
                </label>
                @if ($errors->has('editUserVehicle'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('editUserVehicle') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-span-6 sm:col-span-4">
                <label class="form-check-label">
                    <input type="checkbox" name="removeUser" />
                    remove user role
                </label>
                @if ($errors->has('removeUser'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('removeUser') }}</strong>
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
                    <input type="checkbox" name="addAdminRoles" />
                    Add admin roles role
                </label>
                @if ($errors->has('addAdminRoles'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('addAdminRoles') }}</strong>
                    </span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
