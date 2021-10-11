<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('barcode_number')->nullable(false);

            $table->string('name')->nullable(false);
            $table->string('prenom')->nullable(false);
            $table->string('email')->nullable(false) ->unique();
            $table->string('password')->nullable(false);
            $table->string('pays')->nullable(false);
            $table->string('ville')->nullable(false);
            $table->string('contact')->nullable(false) -> unique();
            $table->string('type')->nullable(false);
            $table->boolean('statut_activite')->default(true);
       
          
            
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
        Schema::dropIfExists('clients');
    }
}
