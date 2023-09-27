<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->decimal('amount', 10, 2);
            $table->string('order_status');
            $table->text('delivery_address');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamps();
        });
        //Artisan::call('db:seed', ['--class' => 'OrdersSeeder']);
    }
    public function down(){
        Schema::dropIfExists('product_orders');
    }
};