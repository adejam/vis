<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_user_vehicles')->insert(array(
            0 => array(
               'id' => 1,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef30',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'Adejam',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'camry 4',
               'vehicleColor' => 'wine',
               'plateNumber' => 'mus546al',
               'vehicleRegNum' => 'wine',
               'vehicleRegState' => 'mus546al',
            ),
        ));
    }
}
