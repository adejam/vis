<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert(array(
            0 => array(
                'id' => 1,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'userId' => 10,
                'communityName' => 'LAUTECH',
                'communityLocation' => 'Pmbs 4000 Ogbomosho, oyo state',
                'aboutCommunity' => 'Vehicle security for lautech community',
                'driverLicenseIdAccess' => 1,
                'vehicleRegNumAccess' => 1,
                'vehicleRegStateAccess' => 1,
            ),
            1 => array(
                'id' => 2,
                'communityId' => '5b12ec70-2f0f-11eb-a7d0-79509a2fd478',
                'userId' => 1,
                'communityName' => 'Buari Street',
                'communityLocation' => 'Ogudu,kosofe local govt, lagos, nigeria',
                'aboutCommunity' => 'for buari street at ogudu',
                'driverLicenseIdAccess' => 0,
                'vehicleRegNumAccess' => 0,
                'vehicleRegStateAccess' => 1,
            ),
            2 => array(
                'id' => 3,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f31dabda9e64',
                'userId' => 2,
                'communityName' => 'Alhaja abass Street',
                'communityLocation' => 'Ogudu,kosofe local govt, lagos, nigeria',
                'aboutCommunity' => 'for alhaja street at ogudu',
                'driverLicenseIdAccess' => 0,
                'vehicleRegNumAccess' => 0,
                'vehicleRegStateAccess' => 1,
            ),
        ));
    }
}
