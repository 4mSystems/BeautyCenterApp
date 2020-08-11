<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_details', function (Blueprint $table) {
            $table->id();

            $table->enum('salonLocation',['yes','no'])->default('no');
            $table->enum('addProducts',['yes','no'])->default('no');
            $table->enum('addCategories',['yes','no'])->default('no');
            $table->enum('reserveService',['yes','no'])->default('no');
            $table->enum('buyProduct',['yes','no'])->default('no');
            $table->enum('ePay',['yes','no'])->default('no');
            $table->enum('followOrders',['yes','no'])->default('no');
            $table->enum('points',['yes','no'])->default('no');
            $table->enum('sellingPoints',['yes','no'])->default('no');
            $table->enum('barcode',['yes','no'])->default('no');
            $table->enum('hr',['yes','no'])->default('no');
            $table->enum('branches',['yes','no'])->default('no');
            $table->enum('productAlerts',['yes','no'])->default('no');
            $table->enum('sms',['yes','no'])->default('no');
            $table->enum('chatting',['yes','no'])->default('no');
            $table->bigInteger('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('package_details');
    }
}
