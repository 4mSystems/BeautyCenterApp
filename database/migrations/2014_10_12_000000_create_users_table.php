<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('restrict');
            $table->string('api_token')->nullable();

            $table->enum('type',['manager','salon','customer'])->default('customer');
            $table->enum('salon_payment_status',['yes','no'])->default('no');
             $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->time('open_from')->nullable();
            $table->time('open_to')->nullable();
            $table->enum('status',['deactive','active'])->default('active');
            $table->enum('is_verfied',['0','1'])->default('0');
            $table->integer('added_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
