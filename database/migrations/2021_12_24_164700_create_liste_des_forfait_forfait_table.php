<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeDesForfaitForfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_des_forfait_forfait', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forfait_id');
            $table -> unsignedBigInteger('liste_des_forfaits_id');
            $table->foreign('forfait_id')->references('id')->on('forfaits') -> onDelete('cascade');
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
        Schema::dropIfExists('liste_des_forfait_forfait');
    }
}
