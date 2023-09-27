<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->string('features')->comment('list of subscription plan features');
            $table->string('frequency')->nullable()->comment('monthly/yearly');
            $table->integer('trial_period')->nullable()->comment('in days');
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'PlansSeeder']);
    }
    public function down(){
        Schema::dropIfExists('plans');
    }
};