<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('nom');
            $table->string("prenom")->unique();
            $table->date("dnais");
            $table->string('password')->unique();
            $table->string('email')->unique();
            $table->string('image')->nullable("true");
            $table->integer('status')->nullable("true");
            $table->date("last_login")->nullable("true");
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
        Schema::dropIfExists('utilisateurs');
    }
}
