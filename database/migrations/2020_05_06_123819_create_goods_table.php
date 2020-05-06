<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->integer('view')->default(0);
            $table->integer('click')->default(0);
            $table->integer('ctr')->default(0);
            $table->boolean('status')->default(1);
            $table->text('note')->nullable()->comment('Для заметок');
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
        Schema::dropIfExists('goods');
    }
}
