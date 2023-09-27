<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessagesSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Contact Message 1',
                'email' => 'contact1@gmail.com',
                'phone' => '9897979791',
                'title' => 'Contact message 1',
                'message' => 'Contact message 1 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Contact Message 2',
                'email' => 'contact2@gmail.com',
                'phone' => '9897979792',
                'title' => 'Contact message 2',
                'message' => 'Contact message 2 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],[
                'name' => 'Contact Message 3',
                'email' => 'contact3@gmail.com',
                'phone' => '9897979793',
                'title' => 'Contact message 3',
                'message' => 'Contact message 3 description',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('contact_messages')->insert($data);
    }
}