<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->bigIncrements('idInv');
            $table->integer('idIsend')->unsigned();
            $table->integer('idIrec')->unsigned();
            $table->foreign('idIsend')->references('idUser')->on('utilisateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idIrec')->references('idUser')->on('utilisateurs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('invitations');
    }
}
