<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            /**
            * Campos requeridos
            * Se genera un perfil cuando se le de un determinado rol a un Usuario
            * Se genera el perfil pero los campos estaran vacios 
            * se les da la propiedad nullable() para poder crearlos vacios
            */
            $table->string('title')->nullable();
            $table->text('biography')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            // campos de las Llaves Foraneas
            $table->unsignedBigInteger('user_id');

            // Restricciones de las Llaves Foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('reviews');
    }
}
