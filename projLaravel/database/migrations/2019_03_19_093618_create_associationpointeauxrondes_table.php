<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationpointeauxrondesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associationpointeauxrondes', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('idRonde',11);
            $table->integer('idPointeau',11);
            $table->integer('ordrePointeau',11);
            $table->integer('tempsProchainMin',11);
            $table->integer('tempsProchainMax',11);
         //   $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associationpointeauxrondes');
    }
}
