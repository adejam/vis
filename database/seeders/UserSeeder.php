<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Adeleye',
                'lastname' => 'Jamiu',
                'username' => 'Adejam',
                'user_phone' => '08124009005',
                'email' => 'adejam@gmail.com',
            ],
            [
                'name' => 'Seun',
                'lastname' => 'Oyelakin',
                'username' => 'costa',
                'user_phone' => '08124509005',
                'email' => 'costa@gmail.com',
            ],
            [
                'name' => 'Hafsoh',
                'lastname' => 'Shittu',
                'username' => 'hafshit',
                'user_phone' => '08124009005',
                'email' => 'hafshit@gmail.com',
            ],
            [
                'name' => 'basit',
                'lastname' => 'korede',
                'username' => 'basituta',
                'user_phone' => '08124009005',
                'email' => 'basituta@gmail.com',
            ],
            [
            'name' => 'Abu',
            'lastname' => 'Ridwan',
            'username' => 'Abu_ridwan',
            'user_phone' => '09036476342',
            'email' => 'aburidwan@gmail.com',
            ],
            [
                'name' => 'Abu',
                'lastname' => 'Rahman',
                'username' => 'Abu_rahman',
                'user_phone' => '09075886342',
                'email' => 'aburahman@gmail.com',
            ],
            [
                'name' => 'Abu',
                'lastname' => 'tah',
                'username' => 'Abu_tah',
                'user_phone' => '08136586342',
                'email' => 'abutah@gmail.com',
            ],
            [
                'name' => 'Omotosho',
                'lastname' => 'Taofeek',
                'username' => 'omotaofeek',
                'user_phone' => '08046586342',
                'email' => 'omotaofeek@gmail.com',
            ],
            [
                'name' => 'Abass',
                'lastname' => 'lanre',
                'username' => 'dlarn',
                'user_phone' => '08098586342',
                'email' => 'dlarn@gmail.com',
            ]
            ];
        foreach ($datas as $data) {
            DB::table('users')->insert([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'user_phone' => $data['user_phone'],
            // 'email' => Str::random(10).'@gmail.com',
            'email' => $data['email'],
            'password' => Hash::make('mmmmmmmm'),
        ]);
        }
    }
}
