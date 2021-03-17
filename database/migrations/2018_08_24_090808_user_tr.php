<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_tr')){

        Schema::create('user_tr', function (Blueprint $table) {
            $table->string('role');
            $table->string('name');
            $table->string('email'); 
            $table->integer('user_id');
            $table->timestamp('created_at');

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
        Schema::dropIfExists('user_tr');
    }
}
