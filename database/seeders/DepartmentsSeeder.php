<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Department 1',
                'description' => 'Department 1 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Department 2',
                'description' => 'Department 2 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Department 3',
                'description' => 'Department 3 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Department 4',
                'description' => 'Department 4 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Department 5',
                'description' => 'Department 5 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Department 6',
                'description' => 'Department 6 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('departments')->insert($data);
    }
}