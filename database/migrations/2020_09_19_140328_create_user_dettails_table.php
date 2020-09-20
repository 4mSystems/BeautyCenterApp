<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDettailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_dettails', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable()->default('https://www.facebook.com');
            $table->string('twitter')->nullable()->default('https://twitter.com');
            $table->string('instgram')->nullable()->default('https://www.instagram.com');
            $table->string('whatsapp')->nullable();
            $table->string('start_working')->nullable();
            $table->string('end_working')->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_dettails');
    }
}
