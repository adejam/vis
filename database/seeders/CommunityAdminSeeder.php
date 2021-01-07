<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CommunityAdmin;

class CommunityAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'communityAdminId' => '431616bc-7875-41a5-be3b-a2591cffbc5d',
                'userId' => 1,
                'communityId' => '5b12ec70-2f0f-11eb-a7d0-79509a2fd478',
                'verifyUser' => 1,
                'removeUserVehicle' => 1,
                'removeAdmin' => 1,
                'addAdmin' => 1,
                'editAdminRoles' => 1,
                'identifyVehicleUser' => 1,
            ],
            [
                'communityAdminId' => '03846340-3af7-11eb-bed7-a5a5d76d29c4',
                'userId' => 2,
                'communityId' => '5b12ec70-2f0f-11eb-a7d0-79509a2fd478',
                'verifyUser' => 1,
                'removeUserVehicle' => 1,
                'removeAdmin' => 0,
                'addAdmin' => 0,
                'editAdminRoles' => 0,
                'identifyVehicleUser' => 1,
            ],
            [
                'communityAdminId' => 'b1fc4081-dea5-451a-ae1d-5be525e6e560',
                'userId' => 2,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f31dabda9e64',
                'verifyUser' => 1,
                'removeUserVehicle' => 1,
                'removeAdmin' => 1,
                'addAdmin' => 1,
                'editAdminRoles' => 1,
                'identifyVehicleUser' => 1,
            ],
            [
                'communityAdminId' => 'c2fc4081-dea5-451a-ae1d-5cf525e6e560',
                'userId' => 4,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f31dabda9e64',
                'verifyUser' => 1,
                'removeUserVehicle' => 1,
                'removeAdmin' => 1,
                'addAdmin' => 0,
                'editAdminRoles' => 0,
                'identifyVehicleUser' => 1,
            ],
            ];
        foreach ($datas as $data) {
            // DB::table('community_admins')->insert([
            CommunityAdmin::create([
                'communityAdminId' => $data['communityAdminId'],
                'userId' => $data['userId'],
                'communityId' => $data['communityId'],
                'verifyUser' => $data['verifyUser'],
                'removeUserVehicle' => $data['removeUserVehicle'],
                'removeAdmin' => $data['removeAdmin'],
                'addAdmin' => $data['addAdmin'],
                'editAdminRoles' => $data['editAdminRoles'],
                'identifyVehicleUser' => $data['identifyVehicleUser'],
        ]);
        }
    }
}
