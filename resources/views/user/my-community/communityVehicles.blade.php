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
        <h4>Ussers Vehicles</h4>
        <p><b>Name: </b>{{ $user->name }} {{ $user->lastname }}</p>
        <p><b>Phone Number: </b>{{ $user->user_phone }}</p>
        @foreach ($communityUserVehicles as $vehicle)
            <div class="vehicle-class">
                <div class="">
                    <p><b>Vehicle Name: </b>{{ $vehicle->vehicleBrand }}</p>
                    <p><b>Vehicle Model: </b>{{ $vehicle->vehicleModel }}</p>
                    <p><b>Vehicle Color: </b>{{ $vehicle->vehicleColor }}</p>
                    <p><b>Driver License Id: </b>{{ $vehicle->driverLicenseId }}</p>
                    <p><b>Vehicle Reg Number: </b>{{ $vehicle->vehicleRegNum }}</p>
                    <p><b>Vehicle Reg State: </b>{{ $vehicle->vehicleRegState }}</p>
                    <p><b>Vehicle plate Number: </b>{{ $vehicle->plateNumber }}</p>
                </div>
                <form method="POST" action="{{ route('community.user.remove-vehicle') }}">
                    @csrf
                    <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                    <input type="hidden" name="communityId" value="{{ $vehicle->communityId }}" />
                    <button type="submit" class="alert alert-danger">Remove Vehicle</button>
                </form>
            </div>
        @endforeach
    </div>


</body>

</html>
