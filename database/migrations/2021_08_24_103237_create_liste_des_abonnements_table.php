<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeDesAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_des_abonnements', function (Blueprint $table) {
            $table->id();

            $table->date('souscri_le')->nullable(false);
            $table->date('fini_le')->nullable(false);

            $table->unsignedBigInteger('abonnement_id');
            $table->foreign('abonnement_id')->references('id')->on('abonnements');

            $table->unsignedBigInteger('client_id')->nullable(false);
            $table->foreign('client_id')->references('id')->on('clients');
            

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
        Schema::dropIfExists('liste_des_abonnements');
    }
}
