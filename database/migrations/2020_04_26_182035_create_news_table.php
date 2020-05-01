<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->integer('view')->default(0);
            $table->integer('click')->default(0);
            $table->integer('ctr')->default(0);
            $table->string('origin_link')->nullable();
            $table->boolean('status')->default(1);
          //  $table->enum("status", ["start", "stop"])->default('start');
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
        Schema::dropIfExists('news');
    }
}
