<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_entrada');
            $table->text('post_contenido');
            $table->string('post_imagen');
            $table->dateTime('fec_pub');
            $table->dateTime('fec_creacion')->nullable();
            $table->integer('estatus');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_etiqueta');
            
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_etiqueta')->references('id')->on('etiquetas');

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
        Schema::dropIfExists('posts');
    }
}
