<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //   $datas = [
        //    [
        //       'userVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef30',
        //       'userId' => 3,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Toyota',
        //       'vehicleModel' => 'camry 4',
        //       'vehicleColor' => 'wine',
        //       'driverLicenseId' => 'dgj638738dd',
        //       'vehicleRegNum' => '537383hi',
        //       'vehicleRegState' => 'Lagos state',
        //       'plateNumber' => 'mus546al',
        //    ],
        //    [
        //       'userVehicleId' => '81f0afe0-2f87-11eb-8370-1f45bf0f2c0e',
        //       'userId' => 5,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Toyota',
        //       'vehicleModel' => 'camry sport',
        //       'vehicleColor' => 'black',
        //       'driverLicenseId' => 'fhj538738dd',
        //       'vehicleRegNum' => '857383hi',
        //       'vehicleRegState' => 'Oyo state',
        //       'plateNumber' => 'ibd546al',
        //    ],
        //    [
        //       'userVehicleId' => '475b0c90-4e3e-11eb-bfaa-b96f983f9b2f',
        //       'userId' => 8,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Golf',
        //       'vehicleModel' => 'Golf 4',
        //       'vehicleColor' => 'green',
        //       'driverLicenseId' => 'gjk538738dd',
        //       'vehicleRegNum' => '8936383hi',
        //       'vehicleRegState' => 'Lagos state',
        //       'plateNumber' => 'kos546al',
        //    ],
        //    [
        //       'userVehicleId' => '835b0c90-2e3e-11eb-8faa-b986983f9b2f',
        //       'userId' => 1,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Audi',
        //       'vehicleModel' => 'Aspire',
        //       'vehicleColor' => 'white',
        //       'driverLicenseId' => 'ht76538738dd',
        //       'vehicleRegNum' => 'ku96383hi',
        //       'vehicleRegState' => 'Lagos state',
        //       'plateNumber' => 'ald546al',
        //    ],
        //    [
        //       'userVehicleId' => 'fg6780c90-2e3e-11eb-8faa-b986983f9b2f',
        //       'userId' => 6,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Benz',
        //       'vehicleModel' => 'legend',
        //       'vehicleColor' => 'Ash',
        //       'driverLicenseId' => 'th76538738dh',
        //       'vehicleRegNum' => '479j6383hi',
        //       'vehicleRegState' => 'Osun state',
        //       'plateNumber' => 'ife546al',
        //    ],
        //    [
        //       'userVehicleId' => 'fg6780c90-2e3e-22eb-8faa-hgu7983f9b2f',
        //       'userId' => 7,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Audi',
        //       'vehicleModel' => 'pro',
        //       'vehicleColor' => 'black',
        //       'driverLicenseId' => '735hdghf6',
        //       'vehicleRegNum' => 'jdhggg36673',
        //       'vehicleRegState' => 'Ogun state',
        //       'plateNumber' => 'ijb746ad',
        //    ],
        //    [
        //       'userVehicleId' => 'fg6780c70-4e5t-11eb-8faa-b986989f9b2f',
        //       'userId' => 9,
        //       'timesVerified' => 0,
        //       'vehicleBrand' => 'Toyota',
        //       'vehicleModel' => 'sport',
        //       'vehicleColor' => 'black',
        //       'driverLicenseId' => '567kndh7',
        //       'vehicleRegNum' => '245ghjkh74',
        //       'vehicleRegState' => 'Lagos state',
        //       'plateNumber' => 'ikd746ap',
        //    ],
        //   ];
        //   foreach ($datas as $data) {
        //       // DB::table('user_vehicles')->insert([
        //       UserVehicle::create([
        //           'userVehicleId' => $data['userVehicleId'],
        //           'userId' => $data['userId'],
        //           'timesVerified' => $data['timesVerified'],
        //           'vehicleBrand' => $data['vehicleBrand'],
        //           'vehicleModel' => $data['vehicleModel'],
        //           'vehicleColor' => $data['vehicleColor'],
        //           'driverLicenseId' => $data['driverLicenseId'],
        //           'vehicleRegNum' => $data['vehicleRegNum'],
        //           'vehicleRegState' => $data['vehicleRegState'],
        //           'plateNumber' => $data['plateNumber'],
        //   ]);
        //   }

        DB::table('user_vehicles')->insert(array(
         0 => array(
             'id' => 1,
             'userVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef30',
            'userId' => 3,
            'timesVerified' => 0,
            'vehicleBrand' => 'Toyota',
            'vehicleModel' => 'camry 4',
            'vehicleColor' => 'wine',
            'driverLicenseId' => 'dgj638738dd',
            'vehicleRegNum' => '537383hi',
            'vehicleRegState' => 'Lagos state',
            'plateNumber' => 'mus546al',
         ),
         1 => array(
            'id' => 2,
            'userVehicleId' => '81f0afe0-2f87-11eb-8370-1f45bf0f2c0e',
            'userId' => 5,
            'timesVerified' => 0,
            'vehicleBrand' => 'Toyota',
            'vehicleModel' => 'camry sport',
            'vehicleColor' => 'black',
            'driverLicenseId' => 'fhj538738dd',
            'vehicleRegNum' => '857383hi',
            'vehicleRegState' => 'Oyo state',
            'plateNumber' => 'ibd546al',
         ),
         2 => array(
            'id' => 3,
            'userVehicleId' => '475b0c90-4e3e-11eb-bfaa-b96f983f9b2f',
            'userId' => 8,
            'timesVerified' => 0,
            'vehicleBrand' => 'Golf',
            'vehicleModel' => 'Golf 4',
            'vehicleColor' => 'green',
            'driverLicenseId' => 'gjk538738dd',
            'vehicleRegNum' => '8936383hi',
            'vehicleRegState' => 'Lagos state',
            'plateNumber' => 'kos546al',
         ),
         3 => array(
            'id' => 4,
            'userVehicleId' => '835b0c90-2e3e-11eb-8faa-b986983f9b2f',
            'userId' => 1,
            'timesVerified' => 0,
            'vehicleBrand' => 'Audi',
            'vehicleModel' => 'Aspire',
            'vehicleColor' => 'white',
            'driverLicenseId' => 'ht76538738dd',
            'vehicleRegNum' => 'ku96383hi',
            'vehicleRegState' => 'Lagos state',
            'plateNumber' => 'ald546al',
         ),
         4 => array(
             'id' => 5,
             'userVehicleId' => 'fg6780c90-2e3e-11eb-8faa-b986983f9b2f',
             'userId' => 6,
             'timesVerified' => 0,
             'vehicleBrand' => 'Benz',
             'vehicleModel' => 'legend',
             'vehicleColor' => 'Ash',
             'driverLicenseId' => 'th76538738dh',
             'vehicleRegNum' => '479j6383hi',
             'vehicleRegState' => 'Osun state',
             'plateNumber' => 'ife546al',
         ),
         5 => array(
            'id' => 6,
            'userVehicleId' => 'fg6780c90-2e3e-22eb-8faa-hgu7983f9b2f',
            'userId' => 7,
            'timesVerified' => 0,
            'vehicleBrand' => 'Audi',
            'vehicleModel' => 'pro',
            'vehicleColor' => 'black',
            'driverLicenseId' => '735hdghf6',
            'vehicleRegNum' => 'jdhggg36673',
            'vehicleRegState' => 'Ogun state',
            'plateNumber' => 'ijb746ad',
         ),
         6 => array(
            'id' => 7,
            'userVehicleId' => 'fg6780c70-4e5t-11eb-8faa-b986989f9b2f',
            'userId' => 9,
            'timesVerified' => 0,
            'vehicleBrand' => 'Toyota',
            'vehicleModel' => 'sport',
            'vehicleColor' => 'black',
            'driverLicenseId' => '567kndh7',
            'vehicleRegNum' => '245ghjkh74',
            'vehicleRegState' => 'Lagos state',
            'plateNumber' => 'ikd746ap',
         ),
     ));
    }
}
