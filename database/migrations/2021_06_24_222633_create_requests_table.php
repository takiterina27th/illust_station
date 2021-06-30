<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('title'); 
            $table->longText('body'); 
            $table->unsignedBigInteger('to_user_id'); 
            $table->unsignedBigInteger('from_user_id'); 
            $table->timestamps(); 
            $table->index( 'to_user_id' );
            $table->index( 'from_user_id' );
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->foreign('from_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
