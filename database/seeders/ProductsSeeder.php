<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ProductsSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'active' => 'yes',
                'name' => 'Product 1',
                'description' => 'Product 1 description',
                'image' => 'images/product.png',
                'code' => 'BPC01',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:50:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:55:00')
            ],[
                'active' => 'yes',
                'name' => 'Product 2',
                'description' => 'Product 2 description',
                'image' => 'images/product.png',
                'code' => 'BPC02',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:51:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:56:00')
            ],[
                'active' => 'yes',
                'name' => 'Product 3',
                'description' => 'Product 3 description',
                'image' => 'images/product.png',
                'code' => 'BPC03',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:52:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:57:00')
            ],[
                'active' => 'yes',
                'name' => 'Product 4',
                'description' => 'Product 4 description',
                'image' => 'images/product.png',
                'code' => 'BPC04',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:53:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:58:00')
            ],[
                'active' => 'yes',
                'name' => 'Product 5',
                'description' => 'Product 5 description',
                'image' => 'images/product.png',
                'code' => 'BPC05',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:54:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:59:00')
            ],[
                'active' => 'yes',
                'name' => 'Product 6',
                'description' => 'Product 6 description',
                'image' => 'images/product.png',
                'code' => 'BPC06',
                'price_original' => '90',
                'price_discounted' => '80',
                'category_id' => 1,
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-15 00:55:00'),
                'updated_at' => (new DateTime())->createFromFormat('Y-m-d H:i:s', '2023-06-18 00:60:00')
            ]
        ];
        DB::table('products')->insert($data);
    }
}