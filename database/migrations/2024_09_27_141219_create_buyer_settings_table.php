<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('buyer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->date('dob')->nullable(); 
            $table->string('number')->nullable(); 
            $table->string('zipcode')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('buyer_settings');
    }
};
