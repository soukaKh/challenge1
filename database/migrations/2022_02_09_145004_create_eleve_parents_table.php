<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleveParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleve_parents', function (Blueprint $table) {
            $table->integer('eleve_id')->unsigned();

            $table->integer('parent_id')->unsigned();
        
            $table->foreign('eleve_id')->references('id')->on('eleves')
        
                ->onDelete('cascade');
        
            $table->foreign('parent_id')->references('id')->on('peres')
        
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleve_parents');
    }
}
