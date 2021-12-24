<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListeDesAbonnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_liste_des_abonnement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('liste_des_abonnements_id');
            $table->foreign('user_id')->references('id')->on('users') -> onDelete('cascade');
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
        Schema::dropIfExists('user_liste_des_abonnement');
    }
}
