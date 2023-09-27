<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('email');
            $table->string('title');
            $table->string('message');
            $table->string('phone')->nullable();
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'ContactMessagesSeeder']);
    }
    public function down(){
        Schema::dropIfExists('contact_messages');
    }
};