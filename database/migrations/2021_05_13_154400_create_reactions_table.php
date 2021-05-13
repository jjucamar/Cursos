<?php

use App\Models\Reaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();

            // Campos requeridos 
            /**
            * Creo dos Ktes en el modelo para poder utilizarlas aqui
            * Previa importación del modelo arriba
            */
            $table->enum('value', [ Reaction::LIKE, Reaction::DISLIKE ]);

            // campos de las Llaves Foraneas
            $table->unsignedBigInteger('user_id');

            // campos necesarios para que sea polimorfica
            /**
            * el campo unsignedBigInteger 
            * debe tener el nombre de la tabla en singular y le damos la terminación able 
            * seguido de "_id"
            * y otro de tipo string debe tener el nombre de la tabla en singular y le damos 
            * la terminación able seguido de "_type"
            * 
            */
            $table->unsignedBigInteger('reactionable_id');
            $table->string('reactionable_type');

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
        Schema::dropIfExists('reactions');
    }
}
