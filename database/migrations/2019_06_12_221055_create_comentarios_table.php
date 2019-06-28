<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('noticia_id')->unsigned();
            $table->string('nome')->nullable();
            $table->text('conteudo')->nullable();
            $table->string('data')->nullable();
            $table->time('horario')->nullable();
            $table->timestamps();
        });

        Schema::table('comentarios', function (Blueprint $table){
            $table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
