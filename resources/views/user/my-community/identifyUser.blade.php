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

    @if ($user)
        <p><b>Name</b>: {{ $user->name }} {{ $user->lastname }}</p>
        <p><b>Phone Number</b>: {{ $user->user_phone }}</p>
        <p><b>Location In Community</b>: {{ $user->locationInCommunity }}</p>
        <p><b>Vehicle Brand</b>: {{ $user->vehicleBrand }}</p>
        <p><b>Vehicle Model</b>: {{ $user->vehicleModel }}</p>
        <p><b>Vehicle Color</b>: {{ $user->vehicleColor }}</p>
        <p><b>Driver's License ID</b>: {{ $user->driverLicenseId }}</p>
        <p><b>Vehicle Registration Number</b>: {{ $user->vehicleRegNum }}</p>
        <p><b>Vehicle Registration State</b>: {{ $user->vehicleRegState }}</p>
        <p><b>Vehicle Plate Number</b>: {{ $user->plateNumber }}</p>
    @else
        Sorry This vehicle user does not exist in your community
    @endif
    <div>

    </div>

</body>

</html>
