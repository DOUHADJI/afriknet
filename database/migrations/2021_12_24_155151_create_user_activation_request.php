<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivationRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activation_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('activation_request_id');
            $table->foreign('user_id')->references('id')->on('users') -> onDelete('cascade');
            $table->foreign('activation_request_id')->references('id')->on('activation_requests')-> onDelete('cascade');
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
        Schema::dropIfExists('user_activation_request');
    }
}
