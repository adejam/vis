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

        .vehicle-class{
            background-color: grey;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    @foreach ($userVehicles as $vehicle)

        <div class="vehicle-class">
            <div class="">
                <p><b>Vehicle Brand: </b>{{ $vehicle->vehicleBrand }}</p>
                <p><b>Vehicle Model: </b>{{ $vehicle->vehicleModel }}</p>
                <p><b>Vehicle Color: </b>{{ $vehicle->vehicleColor }}</p>
                <p><b>driver License Id: </b>{{ $vehicle->driverLicenseId }}</p>
                <p><b>Vehicle Reg Num: </b>{{ $vehicle->vehicleRegNum }}</p>
                <p><b>Vehicle Reg State: </b>{{ $vehicle->vehicleRegState }}</p>
                <p><b>Vehicle Plate Number: </b>{{ $vehicle->plateNumber }}</p>
                <p><b>Associated Communities: </b>{{ $vehicle->timesVerified }}</p>
                <form method="POST" action="{{ route('vehicle.community.join') }}">
                    @csrf
                    <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                    <input type="text" name="communityId" />
                    <textarea rows="" name="locationInCommunity"></textarea>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="alert alert-success">Join Comunity</button>
                    </div>
                </form>
            </div>

            <div>
                <form method="POST" action="{{ route('vehicle.update') }}">
                    @csrf
                    <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="vehicleBrand" value="{{ $vehicle->vehicleBrand }}"
                            placeholder="vehicleBrand" />
                        @if ($errors->has('vehicleBrand'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('vehicleBrand') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="vehicleModel" value="{{ $vehicle->vehicleModel }}"
                            placeholder="vehicleModel" />
                        @if ($errors->has('vehicleModel'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('vehicleModel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="vehicleColor" value="{{ $vehicle->vehicleColor }}"
                            placeholder="vehicleColor" />
                        @if ($errors->has('vehicleColor'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('vehicleColor') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="driverLicenseId" value="{{ $vehicle->driverLicenseId }}"
                            placeholder="driverLicenseId" />
                        @if ($errors->has('driverLicenseId'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('driverLicenseId') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="vehicleRegNum" value="{{ $vehicle->vehicleRegNum }}"
                            placeholder="vehicleRegNum" />
                        @if ($errors->has('vehicleRegNum'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('vehicleRegNum') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="vehicleRegState" value="{{ $vehicle->vehicleRegState }}"
                            placeholder="vehicleRegState" />
                        @if ($errors->has('vehicleRegState'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('vehicleRegState') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="plateNumber" value="{{ $vehicle->plateNumber }}"
                            placeholder="plateNumber" />
                        @if ($errors->has('plateNumber'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('plateNumber') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit">Update</button>
                    </div>

                </form>
                <form method="POST" action="{{ route('vehicle.delete') }}">
                    @csrf
                    <input type="hidden" value="{{ $vehicle->userVehicleId }}" name="userVehicleId" />
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="alert alert-danger">delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>
    <h2>My vehicles</h2>
    <div>
        <h4>Update</h4>
        <form method="POST" action="{{ route('vehicle.add') }}">
            @csrf
            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="vehicleBrand" placeholder="vehicleBrand" />
                @if ($errors->has('vehicleBrand'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('vehicleBrand') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="vehicleModel" placeholder="vehicleModel" />
                @if ($errors->has('vehicleModel'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('vehicleModel') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="vehicleColor" placeholder="vehicleColor" />
                @if ($errors->has('vehicleColor'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('vehicleColor') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="driverLicenseId" placeholder="driverLicenseId" />
                @if ($errors->has('driverLicenseId'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('driverLicenseId') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="vehicleRegNum" placeholder="vehicleRegNum" />
                @if ($errors->has('vehicleRegNum'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('vehicleRegNum') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="vehicleRegState" placeholder="vehicleRegState" />
                @if ($errors->has('vehicleRegState'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('vehicleRegState') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <input type="text" name="plateNumber" placeholder="plateNumber" />
                @if ($errors->has('plateNumber'))
                    <span class="help-block alert alert-danger" role="alert">
                        <strong>{{ $errors->first('plateNumber') }}</strong>
                    </span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit">Submit</button>
            </div>

        </form>
        {{-- <form method="POST" action="{{ route('community.delete') }}">
            @csrf
            <input type="hidden" name="communityId" value={{ $community->communityId }} />
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="alert alert-danger">delete</button>
            </div>
        </form> --}}
    </div>
</body>

</html>
