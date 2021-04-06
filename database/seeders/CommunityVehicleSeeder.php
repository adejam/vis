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
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef01',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'Adejam',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Camry 4',
               'vehicleColor' => 'wine',
               'plateNumber' => 'IKJ110AJ',
               'vehicleRegNum' => 'LAG54657832',
               'vehicleRegState' => 'Lagos',
            ),
            1 => array(
               'id' => 2,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef02',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'olabodepeter1',
               'vehicleBrand' => 'Venza',
               'vehicleModel' => 'Dury A4',
               'vehicleColor' => 'brown',
               'plateNumber' => 'MUS156KO',
               'vehicleRegNum' => 'BEN658684633',
               'vehicleRegState' => 'Benue',
            ),
            2 => array(
               'id' => 3,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef03',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'obama1',
               'vehicleBrand' => 'Hyundai',
               'vehicleModel' => 'Hyundai v-max',
               'vehicleColor' => 'Black',
               'plateNumber' => 'IKD215BO',
               'vehicleRegNum' => 'OGU464698877',
               'vehicleRegState' => 'Ogun',
            ),
            3 => array(
               'id' => 4,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef04',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'joebid',
               'vehicleBrand' => 'Ferrari',
               'vehicleModel' => 'Hydra',
               'vehicleColor' => 'Red',
               'plateNumber' => 'MUS102JB',
               'vehicleRegNum' => 'LAG464699877',
               'vehicleRegState' => 'Lagos',
            ),
            4 => array(
               'id' => 5,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef05',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'mark01',
               'vehicleBrand' => 'Ferrari',
               'vehicleModel' => 'Shark',
               'vehicleColor' => 'Blue',
               'plateNumber' => 'ISL136MZ',
               'vehicleRegNum' => 'LAG464698877',
               'vehicleRegState' => 'Lagos',
            ),
            5 => array(
               'id' => 6,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef06',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'jackdors',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'Spider',
               'vehicleColor' => 'Red',
               'plateNumber' => 'ISL104JD',
               'vehicleRegNum' => 'LAG464697877',
               'vehicleRegState' => 'Lagos',
            ),
            6 => array(
               'id' => 7,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef07',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'jackie',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'Spider',
               'vehicleColor' => 'Red',
               'plateNumber' => 'KOS103JC',
               'vehicleRegNum' => 'LAG465697877',
               'vehicleRegState' => 'Lagos',
            ),
            7 => array(
               'id' => 8,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef08',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'M10',
               'vehicleBrand' => 'Audi',
               'vehicleModel' => 'Lion',
               'vehicleColor' => 'Azure',
               'plateNumber' => 'KOS104LM',
               'vehicleRegNum' => 'LAG465697877',
               'vehicleRegState' => 'Lagos',
            ),
            8 => array(
               'id' => 9,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef09',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'brainer',
               'vehicleBrand' => 'Golf',
               'vehicleModel' => 'Golf 4',
               'vehicleColor' => 'Green',
               'plateNumber' => 'EPE104AE',
               'vehicleRegNum' => 'LAG475697877',
               'vehicleRegState' => 'Lagos',
            ),
            9 => array(
               'id' => 10,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef10',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'Newtonlaw',
               'vehicleBrand' => 'Golf',
               'vehicleModel' => 'Golf 3',
               'vehicleColor' => 'Black',
               'plateNumber' => 'EPE142IN',
               'vehicleRegNum' => 'LAG575697877',
               'vehicleRegState' => 'Lagos',
            ),
            10 => array(
               'id' => 11,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef11',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'CR7',
               'vehicleBrand' => 'Ferrari',
               'vehicleModel' => 'Spider',
               'vehicleColor' => 'Red',
               'plateNumber' => 'IKG318CR',
               'vehicleRegNum' => 'LAG675697877',
               'vehicleRegState' => 'Lagos',
            ),
            11 => array(
               'id' => 12,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef12',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'olusegun-obasanjo-12',
               'vehicleBrand' => 'Benz',
               'vehicleModel' => 'Benz 7',
               'vehicleColor' => 'White',
               'plateNumber' => 'ABK155OO',
               'vehicleRegNum' => 'OGU675697877',
               'vehicleRegState' => 'Ogun',
            ),
            12 => array(
               'id' => 13,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef13',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'wole-soyinka-13',
               'vehicleBrand' => 'Benz',
               'vehicleModel' => 'Benz 5',
               'vehicleColor' => 'Black',
               'plateNumber' => 'BDJ230WS',
               'vehicleRegNum' => 'IBD675697877',
               'vehicleRegState' => 'Oyo',
            ),
            13 => array(
               'id' => 14,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef14',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'babatunde-fashola-14',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Veyron',
               'vehicleColor' => 'Blue',
               'plateNumber' => 'IKJ260BF',
               'vehicleRegNum' => 'LAG675697800',
               'vehicleRegState' => 'Lagos',
            ),
            14 => array(
               'id' => 15,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef15',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'aliko-dangote-15',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Veyron',
               'vehicleColor' => 'Blue',
               'plateNumber' => 'IKD140AD',
               'vehicleRegNum' => 'LAG675697815',
               'vehicleRegState' => 'Lagos',
            ),
            15 => array(
               'id' => 16,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef16',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'okezie-ikpeazu-16',
               'vehicleBrand' => 'Hummer',
               'vehicleModel' => 'Hummer 3',
               'vehicleColor' => 'Black',
               'plateNumber' => 'UMY159OI',
               'vehicleRegNum' => 'ABI675697816',
               'vehicleRegState' => 'Abia',
            ),
            16 => array(
               'id' => 17,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef17',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'ahmadu-umaru-17',
               'vehicleBrand' => 'Venza',
               'vehicleModel' => 'Venza 3',
               'vehicleColor' => 'Black',
               'plateNumber' => 'YOL121AU',
               'vehicleRegNum' => 'ADA675697817',
               'vehicleRegState' => 'ADAMAWA',
            ),
            17 => array(
               'id' => 18,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef18',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'udom-gabriel-18',
               'vehicleBrand' => 'Benz',
               'vehicleModel' => 'Water Benz',
               'vehicleColor' => 'Wine',
               'plateNumber' => 'UYO217UG',
               'vehicleRegNum' => 'AKW675697818',
               'vehicleRegState' => 'AKWA-IBOM',
            ),
            18 => array(
               'id' => 19,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef19',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'willie-obiano-19',
               'vehicleBrand' => 'Hummer',
               'vehicleModel' => 'Hummer 3',
               'vehicleColor' => 'Wine',
               'plateNumber' => 'AWK235WO',
               'vehicleRegNum' => 'ANA675697819',
               'vehicleRegState' => 'ANAMBRA',
            ),
            19 => array(
               'id' => 20,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef20',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'bala-muhammed-20',
               'vehicleBrand' => 'Jeep',
               'vehicleModel' => 'Jeep 6',
               'vehicleColor' => 'Black',
               'plateNumber' => 'BCH217UG',
               'vehicleRegNum' => 'BCH675697820',
               'vehicleRegState' => 'Bauchi',
            ),
            20 => array(
               'id' => 21,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef21',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'duoye-diri-21',
               'vehicleBrand' => 'Hyundai',
               'vehicleModel' => 'Shark',
               'vehicleColor' => 'Black',
               'plateNumber' => 'YEN213BM',
               'vehicleRegNum' => 'BAY675697821',
               'vehicleRegState' => 'Bayelsa',
            ),
            21 => array(
               'id' => 22,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef22',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'samuel-ortom-22',
               'vehicleBrand' => 'Ferrari',
               'vehicleModel' => 'Spider',
               'vehicleColor' => 'Black',
               'plateNumber' => 'MKD195SM',
               'vehicleRegNum' => 'BEN675697822',
               'vehicleRegState' => 'Benue',
            ),
            22 => array(
               'id' => 23,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef23',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'babagana-umara-23',
               'vehicleBrand' => 'Jeep',
               'vehicleModel' => 'Jeep 6',
               'vehicleColor' => 'Black',
               'plateNumber' => 'MDG221BU',
               'vehicleRegNum' => 'BOR675697823',
               'vehicleRegState' => 'Borno',
            ),
            23 => array(
               'id' => 24,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef24',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'benedict-ayade-24',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'Vixen',
               'vehicleColor' => 'White',
               'plateNumber' => 'CLB210BA',
               'vehicleRegNum' => 'CRO675697824',
               'vehicleRegState' => 'Cross river',
            ),
            24 => array(
               'id' => 25,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef25',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'ifeanyi-okowa-25',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'Vixen',
               'vehicleColor' => 'White',
               'plateNumber' => 'ASB915IO',
               'vehicleRegNum' => 'DEL675697825',
               'vehicleRegState' => 'Delta',
            ),
            25 => array(
               'id' => 26,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef26',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'dave-umahi-26',
               'vehicleBrand' => 'Golf',
               'vehicleModel' => 'Golf 4',
               'vehicleColor' => 'Red',
               'plateNumber' => 'ABK421DU',
               'vehicleRegNum' => 'EBO675697826',
               'vehicleRegState' => 'Ebonyi',
            ),
            26 => array(
               'id' => 27,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef27',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'godwin-obaseki-27',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Muscle 3',
               'vehicleColor' => 'Wine',
               'plateNumber' => 'BEN715GO',
               'vehicleRegNum' => 'EDO675697827',
               'vehicleRegState' => 'Edo',
            ),
            27 => array(
               'id' => 28,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef28',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'kayode-fayemi-28',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Muscle 3',
               'vehicleColor' => 'Black',
               'plateNumber' => 'ADO716KF',
               'vehicleRegNum' => 'EKI675697828',
               'vehicleRegState' => 'Ekiti',
            ),
            28 => array(
               'id' => 29,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef29',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'ifeanyi-ugwuanyi-29',
               'vehicleBrand' => 'Hyundai',
               'vehicleModel' => 'Monster',
               'vehicleColor' => 'Black',
               'plateNumber' => 'ENG921IU',
               'vehicleRegNum' => 'ENU675697829',
               'vehicleRegState' => 'Enugu',
            ),
            29 => array(
               'id' => 30,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef30',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'muhammed-inuwa-30',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Veyron',
               'vehicleColor' => 'Blue',
               'plateNumber' => 'GOM139MI',
               'vehicleRegNum' => 'GOM675697830',
               'vehicleRegState' => 'Gombe',
            ),
            30 => array(
               'id' => 31,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef31',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'hope-uzodinma-31',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Spider',
               'vehicleColor' => 'Black',
               'plateNumber' => 'OWR821HU',
               'vehicleRegNum' => 'IMO675697831',
               'vehicleRegState' => 'Imo',
            ),
            31 => array(
               'id' => 32,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef32',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'badaru-abubakar-32',
               'vehicleBrand' => 'Golf',
               'vehicleModel' => 'Golf 3',
               'vehicleColor' => 'Green',
               'plateNumber' => 'DUT210BA',
               'vehicleRegNum' => 'JIG675697832',
               'vehicleRegState' => 'Jigawa',
            ),
            32 => array(
               'id' => 33,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef33',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'nasir-ahmad-33',
               'vehicleBrand' => 'Lexus',
               'vehicleModel' => 'Speedo',
               'vehicleColor' => 'Green',
               'plateNumber' => 'KDN141NA',
               'vehicleRegNum' => 'KAD675697833',
               'vehicleRegState' => 'Kaduna',
            ),
            33 => array(
               'id' => 34,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef34',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'abdullahi-umar-34',
               'vehicleBrand' => 'Hummer',
               'vehicleModel' => 'Hummer 2',
               'vehicleColor' => 'Grey',
               'plateNumber' => 'KAN121AU',
               'vehicleRegNum' => 'KAN675697834',
               'vehicleRegState' => 'Kano',
            ),
            34 => array(
               'id' => 35,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef35',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'aminu-bello-35',
               'vehicleBrand' => 'Hummer',
               'vehicleModel' => 'Hummer 2',
               'vehicleColor' => 'Grey',
               'plateNumber' => 'KAT120AB',
               'vehicleRegNum' => 'KAT675697835',
               'vehicleRegState' => 'Katsina',
            ),
            35 => array(
               'id' => 36,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef36',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'abubakar-atiku-36',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Veyron',
               'vehicleColor' => 'Red',
               'plateNumber' => 'BKB110AA',
               'vehicleRegNum' => 'KEB675697836',
               'vehicleRegState' => 'Kebbi',
            ),
            36 => array(
               'id' => 37,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef37',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'yahaya-bello-37',
               'vehicleBrand' => 'Bugatti',
               'vehicleModel' => 'Veyron',
               'vehicleColor' => 'Red',
               'plateNumber' => 'LKJ262YB',
               'vehicleRegNum' => 'KOG675697837',
               'vehicleRegState' => 'Kogi',
            ),
            37 => array(
               'id' => 38,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef38',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'abdulrahman-abdulrazaq-38',
               'vehicleBrand' => 'Hyundai',
               'vehicleModel' => 'Brado',
               'vehicleColor' => 'Green',
               'plateNumber' => 'ILR110AA',
               'vehicleRegNum' => 'KWA675697838',
               'vehicleRegState' => 'Kwara',
            ),
            38 => array(
               'id' => 39,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef39',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'babajide-sanwoolu-39',
               'vehicleBrand' => 'Hyundai',
               'vehicleModel' => 'Brado',
               'vehicleColor' => 'Green',
               'plateNumber' => 'IKJ219BS',
               'vehicleRegNum' => 'LAG675697839',
               'vehicleRegState' => 'Lagos',
            ),
            39 => array(
               'id' => 40,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef40',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'abdullahi-sule-40',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Muscle',
               'vehicleColor' => 'Green',
               'plateNumber' => 'LAF119AS',
               'vehicleRegNum' => 'NAS675697840',
               'vehicleRegState' => 'Nasarawa',
            ),
            40 => array(
               'id' => 41,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef41',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'abubakar-sani-41',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Muscle',
               'vehicleColor' => 'Green',
               'plateNumber' => 'MIN119AS',
               'vehicleRegNum' => 'NIG675697841',
               'vehicleRegState' => 'Niger',
            ),
            41 => array(
               'id' => 42,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef42',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'dapo-abiodun-42',
               'vehicleBrand' => 'Toyota',
               'vehicleModel' => 'Camry',
               'vehicleColor' => 'Ash',
               'plateNumber' => 'ABK410DA',
               'vehicleRegNum' => 'OGU675697842',
               'vehicleRegState' => 'Ogun',
            ),
            42 => array(
               'id' => 43,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef43',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'oluwarotimi-odunayo-43',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'wood',
               'vehicleColor' => 'Ash',
               'plateNumber' => 'AKR155OO',
               'vehicleRegNum' => 'OND675697843',
               'vehicleRegState' => 'Ondo',
            ),
            43 => array(
               'id' => 44,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef44',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'adegboyega-oyetola-44',
               'vehicleBrand' => 'Lamborghini',
               'vehicleModel' => 'wood',
               'vehicleColor' => 'Ash',
               'plateNumber' => 'OSG115AO',
               'vehicleRegNum' => 'OSU675697844',
               'vehicleRegState' => 'Osun',
            ),
            44 => array(
               'id' => 45,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef45',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'oluwaseyi-makinde-45',
               'vehicleBrand' => 'Lexus',
               'vehicleModel' => 'Slash',
               'vehicleColor' => 'Grey',
               'plateNumber' => 'IBD153OM',
               'vehicleRegNum' => 'OYO675697845',
               'vehicleRegState' => 'Oyo',
            ),
            45 => array(
               'id' => 46,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef46',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'simon-lalong-46',
               'vehicleBrand' => 'Lexus',
               'vehicleModel' => 'Slash',
               'vehicleColor' => 'Grey',
               'plateNumber' => 'JOS192SL',
               'vehicleRegNum' => 'PLA675697846',
               'vehicleRegState' => 'Plateau',
            ),
            46 => array(
               'id' => 47,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef47',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'ezenwo-nyesom-47',
               'vehicleBrand' => 'Aston Martin',
               'vehicleModel' => 'Version 2',
               'vehicleColor' => 'White',
               'plateNumber' => 'PHC514EN',
               'vehicleRegNum' => 'RIV675697847',
               'vehicleRegState' => 'Rivers',
            ),
            47 => array(
               'id' => 48,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef48',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'aminu-waziri-48',
               'vehicleBrand' => 'Aston Martin',
               'vehicleModel' => 'Version 2',
               'vehicleColor' => 'White',
               'plateNumber' => 'SOK123AW',
               'vehicleRegNum' => 'SOK675697848',
               'vehicleRegState' => 'Sokoto',
            ),
            48 => array(
               'id' => 49,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef49',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'darius-ishaku-49',
               'vehicleBrand' => 'Chrysler',
               'vehicleModel' => 'Boycott',
               'vehicleColor' => 'Black',
               'plateNumber' => 'JLG490DI',
               'vehicleRegNum' => 'TAR675697849',
               'vehicleRegState' => 'Taraba',
            ),
            49 => array(
               'id' => 50,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef50',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'mala-buni-50',
               'vehicleBrand' => 'Chrysler',
               'vehicleModel' => 'Boycott',
               'vehicleColor' => 'Black',
               'plateNumber' => 'DMT132MB',
               'vehicleRegNum' => 'YOB675697850',
               'vehicleRegState' => 'Yobe',
            ),
            50 => array(
               'id' => 51,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef51',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'bello-matawalle-51',
               'vehicleBrand' => 'Limosine',
               'vehicleModel' => 'Cruiser',
               'vehicleColor' => 'White',
               'plateNumber' => 'LAF213BM',
               'vehicleRegNum' => 'ZAM675697851',
               'vehicleRegState' => 'Zamfara',
            ),
            51 => array(
               'id' => 52,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef52',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'bello-mohammed-52',
               'vehicleBrand' => 'Limosine',
               'vehicleModel' => 'Cruiser',
               'vehicleColor' => 'White',
               'plateNumber' => 'ABJ213BM',
               'vehicleRegNum' => 'ABU675697852',
               'vehicleRegState' => 'Abuja',
            ),
            52 => array(
               'id' => 53,
               'communityUserVehicleId' => '23e3fb70-2e4f-11eb-ac2f-919b0a27ef53',
               'communityId' => 'fe890840-3c82-11eb-bfcf-f3188657a9e64',
               'username' => 'ahmad-tinubu-53',
               'vehicleBrand' => 'Rolls Royce',
               'vehicleModel' => 'Future',
               'vehicleColor' => 'White',
               'plateNumber' => 'IKJ120AT',
               'vehicleRegNum' => 'LAG675697853',
               'vehicleRegState' => 'Lagos',
            ),
        ));
    }
}
