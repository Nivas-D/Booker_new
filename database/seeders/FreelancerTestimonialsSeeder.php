<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreelancerTestimonialsSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'description' => 'Testimonial 1 for freelancer 1 description',
                'user_id' => '1',
                'freelancer_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'description' => 'Testimonial 2 for freelancer 1 description',
                'user_id' => '1',
                'freelancer_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'description' => 'Testimonial 3 for freelancer 1 description',
                'user_id' => '1',
                'freelancer_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'description' => 'Testimonial 1 for freelancer 2 description',
                'user_id' => '1',
                'freelancer_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'description' => 'Testimonial 2 for freelancer 2 description',
                'user_id' => '1',
                'freelancer_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'description' => 'Testimonial 3 for freelancer 2 description',
                'user_id' => '1',
                'freelancer_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('freelancer_testimonials')->insert($data);
    }
}