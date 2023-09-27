<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreelancersSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Freelancer 1',
                'email' => 'freelancer1@gmail.com',
                'phone' => '9898989901',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Freelancer 2',
                'email' => 'freelancer2@gmail.com',
                'phone' => '9898989902',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Freelancer 3',
                'email' => 'freelancer3@gmail.com',
                'phone' => '9898989903',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Freelancer 4',
                'email' => 'freelancer4@gmail.com',
                'phone' => '9898989904',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Freelancer 5',
                'email' => 'freelancer5@gmail.com',
                'phone' => '9898989905',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Freelancer 6',
                'email' => 'freelancer6@gmail.com',
                'phone' => '9898989906',
                'gender' => 'Male',
                'skills' => 'skill1,skill2,skill3,skill4,skill5',
                'experience' => '5',
                'experience' => '5',
                'payment_type' => 'hourly',
                'hourly_rate' => '500',
                'availability' => '2023-06-16',
                'photo' => 'images/freelancer.png',
                'linkedin_url' => 'https://google.com',
                'portfolio_url' => 'https://google.com',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('freelancers')->insert($data);
    }
}