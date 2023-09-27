<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('service_id');
            $table->string('type')->comment('single/pack');
            $table->decimal('amount', 10, 2);
            $table->string('booking_status');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('service_bookings');
    }
};