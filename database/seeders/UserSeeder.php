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
        // $datas = [
        //     [
        //         'id' => 1,
        //         'name' => 'Adeleye',
        //         'lastname' => 'Jamiu',
        //         'username' => 'Adejam',
        //         'user_phone' => '08124009005',
        //         'email' => 'adejam@gmail.com',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Seun',
        //         'lastname' => 'Oyelakin',
        //         'username' => 'costa',
        //         'user_phone' => '08124509005',
        //         'email' => 'costa@gmail.com',
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Hafsoh',
        //         'lastname' => 'Shittu',
        //         'username' => 'hafshit',
        //         'user_phone' => '08124009005',
        //         'email' => 'hafshit@gmail.com',
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'basit',
        //         'lastname' => 'korede',
        //         'username' => 'basituta',
        //         'user_phone' => '08124009005',
        //         'email' => 'basituta@gmail.com',
        //     ],
        //     [
        //         'id' => 5,
        //         'name' => 'Abu',
        //         'lastname' => 'Ridwan',
        //         'username' => 'Abu_ridwan',
        //         'user_phone' => '09036476342',
        //         'email' => 'aburidwan@gmail.com',
        //     ],
        //     [
        //         'id' => 6,
        //         'name' => 'Abu',
        //         'lastname' => 'Rahman',
        //         'username' => 'Abu_rahman',
        //         'user_phone' => '09075886342',
        //         'email' => 'aburahman@gmail.com',
        //     ],
        //     [
        //         'id' => 7,
        //         'name' => 'Abu',
        //         'lastname' => 'tah',
        //         'username' => 'Abu_tah',
        //         'user_phone' => '08136586342',
        //         'email' => 'abutah@gmail.com',
        //     ],
        //     [
        //         'id' => 8,
        //         'name' => 'Omotosho',
        //         'lastname' => 'Taofeek',
        //         'username' => 'omotaofeek',
        //         'user_phone' => '08046586342',
        //         'email' => 'omotaofeek@gmail.com',
        //     ],
        //     [
        //         'id' => 9,
        //         'name' => 'Abass',
        //         'lastname' => 'lanre',
        //         'username' => 'dlarn',
        //         'user_phone' => '08098586342',
        //         'email' => 'dlarn@gmail.com',
        //     ]
        //     ];
        // foreach ($datas as $data) {
        //     // DB::table('users')->insert([
        //     User::create([
        //     'name' => $data['name'],
        //     'lastname' => $data['lastname'],
        //     'username' => $data['username'],
        //     'user_phone' => $data['user_phone'],
        //     // 'email' => Str::random(10).'@gmail.com',
        //     'email' => $data['email'],
        //     'password' => Hash::make('mmmmmmmm'),
        // ]);
        // }

        DB::table('users')->insert(array(
            0 => array(
                'id' => 1,
                'name' => 'Adeleye',
                'lastname' => 'Jamiu',
                'username' => 'Adejam',
                'user_phone' => '08124009005',
                'email' => 'adejam@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            1 => array(
                'id' => 2,
                'name' => 'Seun',
                'lastname' => 'Oyelakin',
                'username' => 'costa',
                'user_phone' => '08124509005',
                'email' => 'costa@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            2 => array(
                'id' => 3,
                'name' => 'Hafsoh',
                'lastname' => 'Shittu',
                'username' => 'hafshit',
                'user_phone' => '08124009005',
                'email' => 'hafshit@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            3 => array(
                'id' => 4,
                'name' => 'basit',
                'lastname' => 'korede',
                'username' => 'basituta',
                'user_phone' => '08124009005',
                'email' => 'basituta@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            4 => array(
                'id' => 5,
                'name' => 'Abu',
                'lastname' => 'Ridwan',
                'username' => 'Abu_ridwan',
                'user_phone' => '09036476342',
                'email' => 'aburidwan@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            5 => array(
                'id' => 6,
                'name' => 'Abu',
                'lastname' => 'Rahman',
                'username' => 'Abu_rahman',
                'user_phone' => '09075886342',
                'email' => 'aburahman@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            6 => array(
                'id' => 7,
                'name' => 'Abu',
                'lastname' => 'tah',
                'username' => 'Abu_tah',
                'user_phone' => '08136586342',
                'email' => 'abutah@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            7 => array(
                'id' => 8,
                'name' => 'Omotosho',
                'lastname' => 'Taofeek',
                'username' => 'omotaofeek',
                'user_phone' => '08046586342',
                'email' => 'omotaofeek@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
            8 => array(
                'id' => 9,
                'name' => 'Abass',
                'lastname' => 'lanre',
                'username' => 'dlarn',
                'user_phone' => '08098586342',
                'email' => 'dlarn@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
            ),
        ));
    }
}
