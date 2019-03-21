<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointeauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointeaux', function (Blueprint $table) {
            $table->integer('idpointeaux',11);
            $table->char('idTag',8);
            $table->varchar('lieu',20);
            $table->integer('numero',11);
            $table->tinyint('pointeauActif',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pointeauxes');
    }
}
