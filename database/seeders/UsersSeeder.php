<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder {
    public function run(){
        User::factory()->create([
            'id' => 1,
            'name' => 'Admin 1',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'picture' => '../images/user-dummy.png'
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Owner 1',
            'email' => 'owner@gmail.com',
            'role_id' => 2,
            'picture' => '../images/user-dummy.png'
        ]);
        User::factory()->create([
            'id' => 3,
            'name' => 'User 1',
            'email' => 'user@gmail.com',
            'role_id' => 3,
            'picture' => '../images/user-dummy.png'
        ]);
    }
}