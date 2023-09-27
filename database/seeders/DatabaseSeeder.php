<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        $this->call([RolesTableSeeder::class, UsersSeeder::class]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}