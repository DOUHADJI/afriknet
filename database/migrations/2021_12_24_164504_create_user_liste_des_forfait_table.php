<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListeDesForfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_liste_des_forfait', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('liste_des_forfaits_id');
            $table->foreign('user_id')->references('id')->on('users') -> onDelete('cascade');
            $table->foreign('liste_des_forfaits_id')->references('id')->on('liste_des_forfaits')-> onDelete('cascade');
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
        Schema::dropIfExists('user_liste_des_forfait');
    }
}
