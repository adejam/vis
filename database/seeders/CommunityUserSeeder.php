<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_vehicle_users')->insert(array(
            0 => array(
                'id' => 1,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Adeleye',
                'lastname' => 'Jamiu',
                'username' => 'Adejam',
                'user_phone' => '08124009005',
                'profile_photo_path' => 'Jamiu',
                'profile_photo_public_id' => 'Adejam',
                'locationInCommunity' => '',
                'driverLicenseId' => '',
            ),
        ));
    }
}
