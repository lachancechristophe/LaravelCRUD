<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrixProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prix_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_produit');
            $table->integer('id_magasin');
            $table->string('format');
            $table->string('unite');
            $table->float('prix_unite', 8, 2);
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
        Schema::dropIfExists('prix_produits');
    }
}
