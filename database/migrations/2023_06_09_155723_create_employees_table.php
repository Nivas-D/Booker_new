<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('dob');
            $table->string('address');
            $table->string('dept_id');
            $table->string('photo');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'EmployeesSeeder']);
    }
    public function down(){
        Schema::dropIfExists('employees');
    }
};