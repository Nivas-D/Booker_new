<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('skills');
            $table->string('experience')->comment('experinece in years');
            $table->string('payment_type')->comment('hourly or other-type');
            $table->string('hourly_rate');
            $table->string('availability')->nullable()->comment('when available for service');;
            $table->string('photo');
            $table->string('linkedin_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
        Schema::create('freelancer_testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('user_id')->comment('testimonial given by');
            $table->string('freelancer_id');
            //$table->integer('created_by')->nullable();
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'FreelancersSeeder']);
        Artisan::call('db:seed', ['--class' => 'FreelancerTestimonialsSeeder']);
    }
    public function down(){
        Schema::dropIfExists('freelancers');
        Schema::dropIfExists('freelancer_testimonials');
    }
};