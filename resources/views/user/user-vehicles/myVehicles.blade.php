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
    <h2>My vehicles</h2>
    <div>
        <h4>Update</h4>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('vehicles.add') }}">
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
</body>

</html>
