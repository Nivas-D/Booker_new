<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('active')->comment('yes/no');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('code', 10)->nullable();
            $table->decimal('price_original', 10, 2);
            $table->decimal('price_discounted', 10, 2);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            //$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
            //$table->foreignId('created_by')->constrained('users')->onUpdateCascade()->onDeleteCascade();
            //$table->foreignId('category_id')->constrained('categories')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('quantity')->comment('Current stock of the product');
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'ProductsSeeder']);
        Artisan::call('db:seed', ['--class' => 'InventorySeeder']);
    }
    public function down(){
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_inventory');
    }
};