<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'DepartmentsSeeder']);
    }
    public function down(){
        Schema::dropIfExists('departments');
    }
};