<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('building_id')->constrained(); // Foreign key referencing the buildings table
            $table->foreignId('floor_id')->constrained(); // Foreign key referencing the floors table
            $table->string('room_number');
            $table->string('room_type');
            $table->integer('room_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
