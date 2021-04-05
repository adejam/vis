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
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/tm0w06kjtxydrkqxvgey.png',
                'profile_photo_public_id' => 'tm0w06kjtxydrkqxvgey',
                'locationInCommunity' => 'computer science department',
                'driverLicenseId' => 'AJ46536784',
            ),
            1 => array(
                'id' => 2,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Kehinde',
                'lastname' => 'Olabode',
                'username' => 'olabodepeter1',
                'user_phone' => '08105852550',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/zki3hcyjsbwx7iy6dlb7.png',
                'profile_photo_public_id' => 'zki3hcyjsbwx7iy6dlb7',
                'locationInCommunity' => 'computer science department',
                'driverLicenseId' => 'OP46536784',
            ),
            2 => array(
                'id' => 3,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Barrack',
                'lastname' => 'Obama',
                'username' => 'obama1',
                'user_phone' => '08105859320',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/y9w46vsbeccu70mcjgis.png',
                'profile_photo_public_id' => 'y9w46vsbeccu70mcjgis',
                'locationInCommunity' => 'department of management',
                'driverLicenseId' => 'BO465366454',
            ),
            3 => array(
                'id' => 4,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Joe',
                'lastname' => 'Biden',
                'username' => 'joebid',
                'user_phone' => '08005859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/nm35k6cbpw5fcappmr9b.png',
                'profile_photo_public_id' => 'nm35k6cbpw5fcappmr9b',
                'locationInCommunity' => 'department of statistics',
                'driverLicenseId' => 'JB675366454',
            ),
            4 => array(
                'id' => 5,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Mark',
                'lastname' => 'Zuckerburg',
                'username' => 'mark01',
                'user_phone' => '09006859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ks2bk9ifkv2xtx8uurgz.png',
                'profile_photo_public_id' => 'ks2bk9ifkv2xtx8uurgz',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'MZ675366567',
            ),
            5 => array(
                'id' => 6,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Jack',
                'lastname' => 'Dorsey',
                'username' => 'jackdors',
                'user_phone' => '07076859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/mbydc9mxnaiqr6tnr2v2.png',
                'profile_photo_public_id' => 'mbydc9mxnaiqr6tnr2v2',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'JD675360467',
            ),
            6 => array(
                'id' => 7,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Jackie',
                'lastname' => 'Chan',
                'username' => 'jackie',
                'user_phone' => '07089859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/vl3wjfjnonsvntddb1sr.png',
                'profile_photo_public_id' => 'vl3wjfjnonsvntddb1sr',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'JC975361467',
            ),
            7 => array(
                'id' => 8,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Lionel',
                'lastname' => 'Messi',
                'username' => 'M10',
                'user_phone' => '07034859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/bo8vvfqsghenhwjavosz.png',
                'profile_photo_public_id' => 'bo8vvfqsghenhwjavosz',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'LM094661467',
            ),
            8 => array(
                'id' => 9,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Albert',
                'lastname' => 'Einstein',
                'username' => 'brainer',
                'user_phone' => '09043859620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/byqryhnuppxqwuyusma0.png',
                'profile_photo_public_id' => 'byqryhnuppxqwuyusma0',
                'locationInCommunity' => 'department of engineering',
                'driverLicenseId' => 'AE094661467',
            ),
            9 => array(
                'id' => 10,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Isaac',
                'lastname' => 'Newton',
                'username' => 'Newtonlaw',
                'user_phone' => '07043899620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ljldykyjc2nuou80gujs.png',
                'profile_photo_public_id' => 'ljldykyjc2nuou80gujs',
                'locationInCommunity' => 'department of engineering',
                'driverLicenseId' => 'IN094682067',
            ),
            10 => array(
                'id' => 11,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Cristiano',
                'lastname' => 'Ronaldo',
                'username' => 'CR7',
                'user_phone' => '08193899620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/e0cf44wfrkpeh9zwvuik.png',
                'profile_photo_public_id' => 'e0cf44wfrkpeh9zwvuik',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'CR794682067',
            ),
            11 => array(
                'id' => 12,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Olusegun',
                'lastname' => 'Obasanjo',
                'username' => 'olusegun-obasanjo-12',
                'user_phone' => '08193899620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/rreokwoa1xyofmb3d3j2.png',
                'profile_photo_public_id' => 'rreokwoa1xyofmb3d3j2',
                'locationInCommunity' => 'department of agriculture',
                'driverLicenseId' => 'OO984682067',
            ),
            12 => array(
                'id' => 13,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Wole',
                'lastname' => 'Soyinka',
                'username' => 'wole-soyinka-13',
                'user_phone' => '08190799620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/otular26pmkxcgchshox.png',
                'profile_photo_public_id' => 'otular26pmkxcgchshox',
                'locationInCommunity' => 'department of general studies',
                'driverLicenseId' => 'WS984682067',
            ),
            13 => array(
                'id' => 14,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Babatunde',
                'lastname' => 'fashola',
                'username' => 'babatunde-fashola-14',
                'user_phone' => '08190799620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ag1i3wdggabxmrtb7kam.png',
                'profile_photo_public_id' => 'ag1i3wdggabxmrtb7kam',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'BF984091067',
            ),
            14 => array(
                'id' => 15,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Aliko',
                'lastname' => 'Dangote',
                'username' => 'aliko-dangote-15',
                'user_phone' => '08160799620',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/nfiddzjixtcruexuv42ie.png',
                'profile_photo_public_id' => 'nfiddzjixtcruexuv42i',
                'locationInCommunity' => 'faculty of agriculture',
                'driverLicenseId' => 'AD530682067',
            ),
            15 => array(
                'id' => 16,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Okezie',
                'lastname' => 'Ikpeazu',
                'username' => 'okezie-ikpeazu-16',
                'user_phone' => '08170799621',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/fov6xoq4dcazxmrugz1b.png',
                'profile_photo_public_id' => 'fov6xoq4dcazxmrugz1b',
                'locationInCommunity' => 'faculty of arts',
                'driverLicenseId' => 'OI530680267',
            ),
            16 => array(
                'id' => 17,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Ahmadu',
                'lastname' => 'Umaru',
                'username' => 'ahmadu-umaru-17',
                'user_phone' => '08190799622',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/bmydayf6id6tpfafec5l.png',
                'profile_photo_public_id' => 'bmydayf6id6tpfafec5l',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'AU530680267',
            ),
            17 => array(
                'id' => 18,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Udom',
                'lastname' => 'Gabriel',
                'username' => 'udom-gabriel-18',
                'user_phone' => '08190799622',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/qr7gssps1nz6l0e2gr52.png',
                'profile_photo_public_id' => 'qr7gssps1nz6l0e2gr52',
                'locationInCommunity' => 'department of computer engineering',
                'driverLicenseId' => 'UG830680260',
            ),
            18 => array(
                'id' => 19,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Willie',
                'lastname' => 'Obiano',
                'username' => 'willie-obiano-19',
                'user_phone' => '08190999622',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/fuqadpbvd3lsiou2fqwt.png',
                'profile_photo_public_id' => 'fuqadpbvd3lsiou2fqwt',
                'locationInCommunity' => 'department of mechanical engineering',
                'driverLicenseId' => 'WO830680260',
            ),
            19 => array(
                'id' => 20,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Bala',
                'lastname' => 'Muhammed',
                'username' => 'bala-muhammed-20',
                'user_phone' => '08190909722',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/xpqgtqzu8vxunknjsz0v.png',
                'profile_photo_public_id' => 'xpqgtqzu8vxunknjsz0v',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'BM830680260',
            ),
            20 => array(
                'id' => 21,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Duoye',
                'lastname' => 'Diri',
                'username' => 'duoye-diri-21',
                'user_phone' => '08090909722',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/pe5xo4ozvxbekrr9mi0c.png',
                'profile_photo_public_id' => 'pe5xo4ozvxbekrr9mi0c',
                'locationInCommunity' => 'department of accounting',
                'driverLicenseId' => 'DD830jd9260',
            ),
            21 => array(
                'id' => 22,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Samuel',
                'lastname' => 'Ortom',
                'username' => 'samuel-ortom-22',
                'user_phone' => '08090909723',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/u0qsyirhckxancpjuoqe.png',
                'profile_photo_public_id' => 'u0qsyirhckxancpjuoqe',
                'locationInCommunity' => 'department of management',
                'driverLicenseId' => 'SO830jd9260',
            ),
            22 => array(
                'id' => 23,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Babagana',
                'lastname' => 'Umara',
                'username' => 'babagana-umara-23',
                'user_phone' => '08090908754',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/uu47zjkmuipdtbogvhet.png',
                'profile_photo_public_id' => 'uu47zjkmuipdtbogvhet',
                'locationInCommunity' => 'department of physics',
                'driverLicenseId' => 'BU380jd9260',
            ),
            23 => array(
                'id' => 24,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Benedict',
                'lastname' => 'Ayade',
                'username' => 'benedict-ayade-24',
                'user_phone' => '08090908754',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/whndwckxglbs46qb93i0.png',
                'profile_photo_public_id' => 'whndwckxglbs46qb93i0',
                'locationInCommunity' => 'department of physics',
                'driverLicenseId' => 'BA38092po60',
            ),
            24 => array(
                'id' => 25,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Ifeanyi',
                'lastname' => 'okowa',
                'username' => 'ifeanyi-okowa-25',
                'user_phone' => '08190908754',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/omj1h98b72hqwesx5wmm.png',
                'profile_photo_public_id' => 'omj1h98b72hqwesx5wmm',
                'locationInCommunity' => 'department of biology',
                'driverLicenseId' => 'IO02092po60',
            ),
            25 => array(
                'id' => 26,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Dave',
                'lastname' => 'Umahi',
                'username' => 'dave-umahi-26',
                'user_phone' => '07090908754',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/bxtkm1s5qbilcfyluibn.png',
                'profile_photo_public_id' => 'bxtkm1s5qbilcfyluibn',
                'locationInCommunity' => 'department of agriculture',
                'driverLicenseId' => 'DU02092OP60',
            ),
            26 => array(
                'id' => 27,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'godwin',
                'lastname' => 'obaseki',
                'username' => 'godwin-obaseki-27',
                'user_phone' => '07090908745',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/z85nyehbfag7jzdcqtrd.png',
                'profile_photo_public_id' => 'z85nyehbfag7jzdcqtrd',
                'locationInCommunity' => 'department of agriculture',
                'driverLicenseId' => 'GO00292OP60',
            ),
            27 => array(
                'id' => 28,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'kayode',
                'lastname' => 'fayemi',
                'username' => 'kayode-fayemi-28',
                'user_phone' => '07010908745',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/nfpptsv4jvtbeenbcttb.png',
                'profile_photo_public_id' => 'nfpptsv4jvtbeenbcttb',
                'locationInCommunity' => 'department of food science',
                'driverLicenseId' => 'KF01292OP60',
            ),
            28 => array(
                'id' => 29,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'ifeanyi',
                'lastname' => 'ugwuanyi',
                'username' => 'ifeanyi-ugwuanyi-29',
                'user_phone' => '07010907845',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/u1vcuc2dhqjuouxoavin.png',
                'profile_photo_public_id' => 'u1vcuc2dhqjuouxoavin',
                'locationInCommunity' => 'department of food science',
                'driverLicenseId' => 'IU02292OP60',
            ),
            29 => array(
                'id' => 30,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Muhammed',
                'lastname' => 'Inuwa',
                'username' => 'muhammed-inuwa-30',
                'user_phone' => '07010907093',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/c6fllwvrewf5wlckeyjy.png',
                'profile_photo_public_id' => 'c6fllwvrewf5wlckeyjy',
                'locationInCommunity' => 'department of food science',
                'driverLicenseId' => 'MI03292OP60',
            ),
            30 => array(
                'id' => 31,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Hope',
                'lastname' => 'Uzodinma',
                'username' => 'hope-uzodinma-31',
                'user_phone' => '07010709093',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/j8uqmbxprtzkdpf2fwnt.png',
                'profile_photo_public_id' => 'j8uqmbxprtzkdpf2fwnt',
                'locationInCommunity' => 'department of food engineering',
                'driverLicenseId' => 'HU04292OP60',
            ),
            31 => array(
                'id' => 32,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Badaru',
                'lastname' => 'Abubakar',
                'username' => 'badaru-abubakar-32',
                'user_phone' => '07010709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ntqyd6geefdbiz49h6t5.png',
                'profile_photo_public_id' => 'ntqyd6geefdbiz49h6t5',
                'locationInCommunity' => 'department of chemical engineering',
                'driverLicenseId' => 'BA05292OP60',
            ),
            32 => array(
                'id' => 33,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Nasir',
                'lastname' => 'Ahmad',
                'username' => 'nasir-ahmad-33',
                'user_phone' => '07020709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/kfuxuo7esy3jwiais0db.png',
                'profile_photo_public_id' => 'kfuxuo7esy3jwiais0db',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'NA06292OP60',
            ),
            33 => array(
                'id' => 34,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'Abdullahi',
                'lastname' => 'Umar',
                'username' => 'abdullahi-umar-34',
                'user_phone' => '07030709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/hfizemdegbpq80v5noce.png',
                'profile_photo_public_id' => 'hfizemdegbpq80v5noce',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'AU07292OP60',
            ),
            34 => array(
                'id' => 35,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'aminu',
                'lastname' => 'bello',
                'username' => 'aminu-bello-35',
                'user_phone' => '07040709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/youbtxoccsvdmslowc5z.png',
                'profile_photo_public_id' => 'youbtxoccsvdmslowc5z',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'AB08292OP60',
            ),
            35 => array(
                'id' => 36,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'abubakar',
                'lastname' => 'atiku',
                'username' => 'abubakar-atiku-36',
                'user_phone' => '07050709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/tmtxr1fhj4jfwtpkv0l6.png',
                'profile_photo_public_id' => 'tmtxr1fhj4jfwtpkv0l6',
                'locationInCommunity' => 'department of chemical engineering',
                'driverLicenseId' => 'AA09292OP60',
            ),
            36 => array(
                'id' => 37,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'yahaya',
                'lastname' => 'bello',
                'username' => 'yahaya-bello-37',
                'user_phone' => '07060709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/oyafcencwjd6lpwuoaza.png',
                'profile_photo_public_id' => 'oyafcencwjd6lpwuoaza',
                'locationInCommunity' => 'department of computer engineering',
                'driverLicenseId' => 'YB19292OP60',
            ),
            37 => array(
                'id' => 38,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'abdulrahman',
                'lastname' => 'abdulrazaq',
                'username' => 'abdulrahman-abdulrazaq-38',
                'user_phone' => '07070709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ciyqtjslipkm75qupckb.png',
                'profile_photo_public_id' => 'ciyqtjslipkm75qupckb',
                'locationInCommunity' => 'department of computer engineering',
                'driverLicenseId' => 'AA29292OP60',
            ),
            38 => array(
                'id' => 39,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'babajide',
                'lastname' => 'sanwoolu',
                'username' => 'babajide-sanwoolu-39',
                'user_phone' => '07080709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/dz4x0sssvrjwxyishfwd.png',
                'profile_photo_public_id' => 'dz4x0sssvrjwxyishfwd',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'BS39292OP60',
            ),
            39 => array(
                'id' => 40,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'abdullahi',
                'lastname' => 'sule',
                'username' => 'abdullahi-sule-40',
                'user_phone' => '07000709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/cisxj5vbxxbsbrggb6qy.png',
                'profile_photo_public_id' => 'cisxj5vbxxbsbrggb6qy',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'AS49292OP60',
            ),
            40 => array(
                'id' => 41,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'abubakar',
                'lastname' => 'sani',
                'username' => 'abubakar-sani-41',
                'user_phone' => '07092709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/j20v59tvxwqd1z95hgef.png',
                'profile_photo_public_id' => 'j20v59tvxwqd1z95hgef',
                'locationInCommunity' => 'department of arts',
                'driverLicenseId' => 'AS49292OP60',
            ),
            41 => array(
                'id' => 42,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'dapo',
                'lastname' => 'abiodun',
                'username' => 'dapo-abiodun-42',
                'user_phone' => '07093709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/s667v0r2aw4i5z28kvqp.png',
                'profile_photo_public_id' => 's667v0r2aw4i5z28kvqp',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'DA59292OP60',
            ),
            42 => array(
                'id' => 43,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'oluwarotimi',
                'lastname' => 'odunayo',
                'username' => 'oluwarotimi-odunayo-43',
                'user_phone' => '07094709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/rzlx5ws6nsakmtupy95q.png',
                'profile_photo_public_id' => 'rzlx5ws6nsakmtupy95q',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'OO69292OP60',
            ),
            43 => array(
                'id' => 44,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'adegboyega',
                'lastname' => 'oyetola',
                'username' => 'adegboyega-oyetola-44',
                'user_phone' => '07095709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/wtxdcgfk96jnw8zv8u09.png',
                'profile_photo_public_id' => 'wtxdcgfk96jnw8zv8u09',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'AO79292OP60',
            ),
            44 => array(
                'id' => 45,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'oluwaseyi',
                'lastname' => 'makinde',
                'username' => 'oluwaseyi-makinde-45',
                'user_phone' => '07096709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/w3ybzrh5ucmq6n6sgumh.png',
                'profile_photo_public_id' => 'w3ybzrh5ucmq6n6sgumh',
                'locationInCommunity' => 'department of accounting',
                'driverLicenseId' => 'OM89292OP60',
            ),
            45 => array(
                'id' => 46,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'simon',
                'lastname' => 'lalong',
                'username' => 'simon-lalong-46',
                'user_phone' => '07097709039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/gbl15yq1ihpcptjiokqn.png',
                'profile_photo_public_id' => 'gbl15yq1ihpcptjiokqn',
                'locationInCommunity' => 'department of accounting',
                'driverLicenseId' => 'SL99292OP60',
            ),
            46 => array(
                'id' => 47,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'ezenwo',
                'lastname' => 'nyesom',
                'username' => 'ezenwo-nyesom-47',
                'user_phone' => '07097809039',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/cfrxsrko03ssmtnw29wr.png',
                'profile_photo_public_id' => 'cfrxsrko03ssmtnw29wr',
                'locationInCommunity' => 'department of management',
                'driverLicenseId' => 'EN99292OP61',
            ),
            47 => array(
                'id' => 48,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'aminu',
                'lastname' => 'waziri',
                'username' => 'aminu-waziri-48',
                'user_phone' => '07097809049',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ycgqotd2obynjtnm5lri.png',
                'profile_photo_public_id' => 'ycgqotd2obynjtnm5lri',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'AW99292OP62',
            ),
            48 => array(
                'id' => 49,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'darius',
                'lastname' => 'ishaku',
                'username' => 'darius-ishaku-49',
                'user_phone' => '07097809059',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/qviufdq2khhcxug9scdd.png',
                'profile_photo_public_id' => 'qviufdq2khhcxug9scdd',
                'locationInCommunity' => 'department of civil engineering',
                'driverLicenseId' => 'DI99292OP63',
            ),
            49 => array(
                'id' => 50,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'mala',
                'lastname' => 'buni',
                'username' => 'mala-buni-50',
                'user_phone' => '07097809059',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/jxkfqbc3fxguzcmmvozu.png',
                'profile_photo_public_id' => 'jxkfqbc3fxguzcmmvozu',
                'locationInCommunity' => 'department of computer engineering',
                'driverLicenseId' => 'MB99292OP63',
            ),
            50 => array(
                'id' => 51,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'bello',
                'lastname' => 'matawalle',
                'username' => 'bello-matawalle-51',
                'user_phone' => '07097809069',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/ltrg8otxpzjhe5lfck64.png',
                'profile_photo_public_id' => 'ltrg8otxpzjhe5lfck64',
                'locationInCommunity' => 'department of computer engineering',
                'driverLicenseId' => 'BM99292OP64',
            ),
            51 => array(
                'id' => 52,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'bello',
                'lastname' => 'mohammed',
                'username' => 'bello-mohammed-52',
                'user_phone' => '07097809079',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/b2v8ha9b9frshtcplxpu.png',
                'profile_photo_public_id' => 'b2v8ha9b9frshtcplxpu',
                'locationInCommunity' => 'department of computer science',
                'driverLicenseId' => 'BM99292OP65',
            ),
            52 => array(
                'id' => 53,
                'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
                'name' => 'ahmad',
                'lastname' => 'tinubu',
                'username' => 'ahmad-tinubu-54',
                'user_phone' => '07097809089',
                'profile_photo_path' => 'http://res.cloudinary.com/communivis/image/upload/c_fit,h_300,w_300/azbpdjmwapfxmj57ygp9.png',
                'profile_photo_public_id' => 'azbpdjmwapfxmj57ygp9',
                'locationInCommunity' => 'department of food science',
                'driverLicenseId' => 'AT99292OP66',
            ),
        ));
    }
}
