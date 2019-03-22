<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationagentsrondesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associationagentsrondes', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('idAgent',11);
            $table->integer('idRonde',11);
            $table->foreign('idAgent')->references('idAgent')->on('agents');
            $table->foreign('idRonde')->references('idrondes')->on('rondes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associationagentsrondes');
    }
}
