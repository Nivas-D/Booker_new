<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Employee 1',
                'email' => 'employee1@gmail.com',
                'phone' => '9898989801',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => 1,
                'photo' => 'images/employee.png',
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Employee 2',
                'email' => 'employee2@gmail.com',
                'phone' => '9898989802',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => 1,
                'photo' => 'images/employee.png',
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Employee 3',
                'email' => 'employee3@gmail.com',
                'phone' => '9898989803',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => 1,
                'photo' => 'images/employee.png',
                'user_id' => 1,
                'owner_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Employee 4',
                'email' => 'employee4@gmail.com',
                'phone' => '9898989804',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => '1',
                'photo' => 'images/employee.png',
                'user_id' => '1',
                'owner_id' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Employee 5',
                'email' => 'employee5@gmail.com',
                'phone' => '9898989805',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => '1',
                'photo' => 'images/employee.png',
                'user_id' => '1',
                'owner_id' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Employee 6',
                'email' => 'employee6@gmail.com',
                'phone' => '9898989806',
                'gender' => 'Male',
                'dob' => '01-01-2004',
                'address' => 'Some Place, Connaught Place, New Delhi',
                'dept_id' => '1',
                'photo' => 'images/employee.png',
                'user_id' => '1',
                'owner_id' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('employees')->insert($data);
    }
}