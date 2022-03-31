<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->integer('device_amount');
            $table->integer('device_status')->default(1)->comment = "
                    1 = ปกติ,
                    2 = ชำรุด";
            $table->unsignedBigInteger('type_id');
            $table->string('location');
            $table->string('image');
            $table->integer('device_year');
            $table->integer('defective_device')->default(0);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
