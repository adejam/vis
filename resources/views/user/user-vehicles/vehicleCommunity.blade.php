@php
use App\Http\Controllers\UserVehicleController;
@endphp
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

        .community-class {
            background-color: grey;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    <div class="community-class">
        <p><b>Community Name: </b>{{ $community->communityName }}</p>
        <p><b>Community Location: </b>{{ $community->communityLocation }}</p>
        <p><b>About Community: </b>{{ $community->aboutCommunity }}</p>
    </div>
    @foreach ($communityAdmins as $admin)
    <div class="community-class">
        <p><b>Admin Name: </b>{{ $admin->name }} {{ $admin->lastname }}</p>
    </div>
    @endforeach
</body>

</html>
