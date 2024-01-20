<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('meal_allocations', function (Blueprint $table) {
            $table->id(); 
            $table->date('assign_date');
            $table->foreignId('meal_id')->constrained('meals'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_allocations');
    }
};
