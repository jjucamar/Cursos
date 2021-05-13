<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Campos requeridos 
            $table->string('name');

            // campos de las Llaves Foraneas
            $table->unsignedBigInteger('user_id');

            // campos necesarios para que sea polimorfica
            /**
            * el campo unsignedBigInteger 
            * debe tener el nombre de la tabla en singular y le damos la terminacion able 
            * segido de "_id"
            * y otro de tipo string debe tener el nombre de la tabla en singular y le damos 
            * la terminacion able segido de "_type"
            * 
            */
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

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
        Schema::dropIfExists('comments');
    }
}
