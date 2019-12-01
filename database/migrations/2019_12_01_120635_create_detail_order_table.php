<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order')->unsigned()->nullable();
            $table->integer('id_menu')->unsigned()->nullable();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_order');
    }
}
