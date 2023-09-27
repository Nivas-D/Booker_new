<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('active')->comment('yes/no');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('code', 10)->nullable();
            $table->decimal('price_original', 10, 2);
            $table->decimal('price_discounted', 10, 2);
            $table->string('duration')->comment('in hours');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            //$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::create('service_to_freelancer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedInteger('assigned_by');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            //$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::create('service_to_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('assigned_by');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            //$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
        Artisan::call('db:seed', ['--class' => 'ServicesSeeder']);
    }
    public function down(){
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_to_freelancer');
        Schema::dropIfExists('service_to_employee');
    }
};