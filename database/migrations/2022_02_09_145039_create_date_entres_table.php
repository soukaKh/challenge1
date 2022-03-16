<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateEntresTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('date_entres', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_E');
            $table->integer('parent_id')->unsigned();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('peres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('date_entres');
    }
}
