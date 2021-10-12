<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeDesForfaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_des_forfaits', function (Blueprint $table) {
            $table->id();

            $table->date('souscri_le')->nullable(false);
            $table->date('fini_le')->nullable(false);

            $table->unsignedBigInteger('forfait_id');
            $table->foreign('forfait_id')->references('id')->on('forfaits');

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');


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
        Schema::dropIfExists('liste_des_forfaits');
    }
}
