<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('movie_id');
            $table->string('customer_name',100)->required();
            $table->string('seat_number',5)->required();
            $table->boolean('is_checked_in')->default(0);
            $table->dateTime('check_in_time')->nullable();
            $table->timestamps();


            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
