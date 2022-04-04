<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type_detail');
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_name');
            $table->integer('stock_amount');
            $table->integer('stock_status')->default(1)->comment = "
                    1 = ปกติ,
                    2 = ชำรุด";

            $table->string('image');
            $table->string('position');
            $table->integer('amount_minimum');
            $table->unsignedBigInteger('type_id');
            $table->string('stock_num');
            $table->integer('defective_stock')->default(0);
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
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('types');
    }
}
