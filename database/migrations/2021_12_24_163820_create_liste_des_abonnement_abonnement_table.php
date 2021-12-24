<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeDesAbonnementAbonnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_des_abonnement_abonnement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('abonnement_id');
            $table -> unsignedBigInteger('liste_des_abonnements_id');
            $table->foreign('abonnement_id')->references('id')->on('abonnements') -> onDelete('cascade');
            $table->foreign('liste_des_abonnements_id')->references('id')->on('liste_des_abonnements')-> onDelete('cascade');
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
        Schema::dropIfExists('liste_des_abonnement_abonnement');
    }
}
