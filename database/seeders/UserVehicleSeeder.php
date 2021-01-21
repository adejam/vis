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
        DB::table('user_vehicles')->insert(array(
         0 => array(
             'id' => 1,
             'userVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef30',
            'userId' => 3,
            'timesVerified' => 0,
            'vehicleBrand' => 'Toyota',
            'vehicleModel' => 'camry 4',
            'vehicleColor' => 'wine',
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
            'plateNumber' => 'ikd746ap',
         ),
     ));
    }
}
