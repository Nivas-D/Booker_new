<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ServicesSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'active' => 'yes',
                'name' => 'Service 1',
                'description' => 'Service 1 description',
                'image' => 'images/service.png',
                'code' => 'BSC01',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:50:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:55:00')
            ],[
                'active' => 'yes',
                'name' => 'Service 2',
                'description' => 'Service 2 description',
                'image' => 'images/service.png',
                'code' => 'BSC02',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:51:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:56:00')
            ],[
                'active' => 'yes',
                'name' => 'Service 3',
                'description' => 'Service 3 description',
                'image' => 'images/service.png',
                'code' => 'BSC03',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:52:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:57:00')
            ],[
                'active' => 'yes',
                'name' => 'Service 4',
                'description' => 'Service 4 description',
                'image' => 'images/service.png',
                'code' => 'BSC04',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:53:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:58:00')
            ],[
                'active' => 'yes',
                'name' => 'Service 5',
                'description' => 'Service 5 description',
                'image' => 'images/service.png',
                'code' => 'BSC05',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:54:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:59:00')
            ],[
                'active' => 'yes',
                'name' => 'Service 6',
                'description' => 'Service 6 description',
                'image' => 'images/service.png',
                'code' => 'BSC06',
                'price_original' => '90',
                'price_discounted' => '80',
                'duration' => '8',
                'industry_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:55:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:60:00')
            ]
        ];
        DB::table('services')->insert($data);
    }
}