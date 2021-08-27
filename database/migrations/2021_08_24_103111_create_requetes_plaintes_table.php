<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequetesPlaintesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requetes_plaintes', function (Blueprint $table) {
            $table->id();
            
            $table->string('type')->nullable(false);
            $table->string('motif')->nullable(false);
            $table->mediumText('message')->nullable(false);
            $table->boolean('statut');

            $table->unsignedBigInteger('client_id');
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
        Schema::dropIfExists('requetes_plaintes');
    }
}
