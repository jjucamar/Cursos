<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//llamamos al modelo course
use App\Models\Course;
class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // campos Requeridos
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            /**
            * para poder utilizar Kte debemos definirlas en el modelo Course primero luego
            * llamamos el modelo al principio luego le decimos que vamos a utilizar ese modelo
            * y el nombre de la Kte Course::BORRADOR
            * */ 
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);

            // para las Urls Amigables
            $table->string('slug');

            /**
            * Campo para las Relaciones
            * Con la opción unsignedBigInteger le decimos que User _id es un campo único.
            * con la opción nullable le decimos que aceptamos en el campo valor vacio o nulo
            * y asi sucesivamene con los otros campos
            * */ 
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();

            
            /** 
            * Relaciones
            * con foreign le digo que es una llave foránea con lo cual solo me permite ingresar
            * valores de la tabla User 
            * Cascade se eliminan en cascada por eso si se elimina un usuario sus cursos se
            * eliminaran también y 
            * SET NULL es la otra forma y lo que me dice es
            * que si lo elimino coloque en su lugar NULL pero para esos debes especificar que el 
            * campo acepta valores null quedando así:
            * 
            * la relación entre la tabla cursos y usarios es de muchos a muchos por lo que se
            * crea una tabla intermedia y lo hacemos así 
            * php artisan make:migration create_course_user_table
            * 
            */

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');



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
        Schema::dropIfExists('courses');
    }
}
