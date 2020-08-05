<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->unique(['goods_id', 'country_id'], 'unique_pair');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_goods');
    }
}
