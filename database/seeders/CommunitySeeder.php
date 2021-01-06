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
        $datas = [
            [
                'communityId' => 'fe890840-3c82-11eb-bfcf-f31dabda9e64',
                'userId' => 2,
                'communityName' => 'Alhaja abass Street',
                'communityLocation' => 'Ogudu,kosofe local govt, lagos, nigeria',
                'aboutCommunity' => 'for alhaja street at ogudu',
            ],
            [
                'communityId' => '5b12ec70-2f0f-11eb-a7d0-79509a2fd478',
                'userId' => 1,
                'communityName' => 'Buari Street',
                'communityLocation' => 'Ogudu,kosofe local govt, lagos, nigeria',
                'aboutCommunity' => 'for buari street at ogudu',
            ],
            ];
        foreach ($datas as $data) {
            DB::table('communities')->insert([
            'communityId' => $data['communityId'],
            'userId' => $data['userId'],
            'communityName' => $data['communityName'],
            'communityLocation' => $data['communityLocation'],
            'aboutCommunity' => $data['aboutCommunity'],
        ]);
        }
    }
}
