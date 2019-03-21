<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainscourantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainscourantes', function (Blueprint $table) {
            $table->integer('id',11);
            $table->varchar('texte',250);
            $table->datetime('date');
            $table->integer('type',11);
            $table->integer('idHistoriquePointeau',11);
           // $table->foreign('idHistoriquePointeau')->references('id')->on('historiquepointeau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainscourantes');
    }
}
