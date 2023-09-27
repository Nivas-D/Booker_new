<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('code', 10)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
        Artisan::call('db:seed', ['--class' => 'IndustriesSeeder']);
    }
    public function down(){
        Schema::dropIfExists('industries');
    }
};