<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')/* ->unique() */;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('pays')->nullable(false);
            $table->string('ville')->nullable(false);
            $table->string('contact')->nullable(false) /*  -> unique() */;
            $table->string('type')->nullable(false);
            $table->boolean('statut_activite')->default(true);     
            $table->string('barcode_number')->nullable(false);
            $table -> string("token") ->nullable();
            $table -> string('user_type') ->default('user');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
