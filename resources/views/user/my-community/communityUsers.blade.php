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

        .vehicle-class {
            background-color: grey;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    <div>
        @foreach ($communityVehicleUsers as $user)
            <div class="vehicle-class">
                <div class="">
                    <p><b>Name: </b>{{ $user->name }} {{ $user->lastname }} @_{{ $user->username }}</p>
                    <a href="{{ url('my-community/' . $communityId . '/vehicle-users/' . $user->username) }}">view
                    </a>
                </div>
            </div>
        @endforeach
    </div>


</body>

</html>
