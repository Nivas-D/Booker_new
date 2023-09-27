<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Industry 1',
                'description' => 'Industry 1 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Industry 2',
                'description' => 'Industry 2 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Industry 3',
                'description' => 'Industry 3 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Industry 4',
                'description' => 'Industry 4 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Industry 5',
                'description' => 'Industry 5 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Industry 6',
                'description' => 'Industry 6 description',
                'image' => 'images/industry.png',
                'code' => 'BIC01',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('industries')->insert($data);
    }
}