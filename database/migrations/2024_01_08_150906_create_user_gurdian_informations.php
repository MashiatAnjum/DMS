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
        Schema::create('user_gurdian_informations', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained();
            $table->string('fathers_name');
            $table->string('fathers_mobile');
            $table->string('mothers_name');
            $table->string('mothers_mobile');
            $table->string('local_gurdian_name');
            $table->string('local_gurdian_mobile');
            $table->text('local_gurdian_address');
            
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
        Schema::dropIfExists('user_gurdian_informations');
    }
};
