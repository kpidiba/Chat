<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('msg_id');
            $table->integer('sender_id')->unsigned();
            $table->integer('receveir_id')->unsigned();
            $table->foreign('sender_id')->references('idUser')->on('utilisateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('receveir_id')->references('idUser')->on('utilisateurs')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('msg');
            $table->string('file');
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
        Schema::dropIfExists('messages');
    }
}
