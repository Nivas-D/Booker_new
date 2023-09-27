<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'First Aid',
                'description' => 'Get any first aid course at the best price',
                'image' => 'images/category.png',
                'code' => 'BCC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Theory Courses',
                'description' => 'Get any available theory course at best prices',
                'image' => 'images/category.png',
                'code' => 'BCC02',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Awareness Courses',
                'description' => 'Get any awareness course at best pricing',
                'image' => 'images/category.png',
                'code' => 'BCC03',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Driving Lessons',
                'description' => 'Participate in any suitable driving lesson and pass your license exam with ease',
                'image' => 'images/category.png',
                'code' => 'BCC04',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Motorcycle Courses',
                'description' => 'Choose and take part in any motorcycle course and pass your exam with ease',
                'image' => 'images/category.png',
                'code' => 'BCC05',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'License Exchange',
                'description' => 'Take part in any available driving license exchange program',
                'image' => 'images/category.png',
                'code' => 'BCC06',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Car Driving Courses',
                'description' => 'Take up any available car driving course and upgrade your car driving skills',
                'image' => 'images/category.png',
                'code' => 'BCC07',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Supplements',
                'description' => 'Get any available supplement product or course at best prices',
                'image' => 'images/category.png',
                'code' => 'BCC08',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('categories')->insert($data);
    }
}