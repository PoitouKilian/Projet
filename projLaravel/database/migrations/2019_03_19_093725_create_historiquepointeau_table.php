<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriquepointeauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiquepointeau', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('idAgent',11);
            $table->integer('idRonde',11);
            $table->integer('idPointeau',11);
            $table->datetime('date',11);
            $table->integer('ordrePointeau',11);
            $table->integer('numeroRonde',11);
           // $table->foreign('idPointeau')->references('idpointeaux')->on('pointeaux');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiquepointeau');
    }
}
