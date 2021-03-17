<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogsTr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('Logs_tr')){
            Schema::create('Logs_tr', function (Blueprint $table) {
                $table->increments('id');
                $table->string('Role');
                $table->string('Email');
                $table->string('Date_In');
                $table->string('Time_In');
                $table->string('Time_Out')->nullable();
                $table->timestamps();
            });
         }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Logs_tr');
    }
}
