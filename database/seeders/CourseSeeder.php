<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//importo los modelo necesarios
use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;



class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /**
    * llamamos al modelo Course le pasamos el metodo factory 
    * y le pedimos que nos genere 150 registros y por ultimo le
    * pasamos el metodo create() guardamos todo en la variable 
    * $courses
    * */ 
    $courses = Course::factory(150)->create();
    
    /**
    * recorremos todos los datos de Course
    */
    foreach ($courses as $course) {
    
    // para crear los Review
    Review::factory(5)->create([
    'course_id' => $course->id
    ]);
    
    /**
    * Vamos descargar imagenes para nuestro curso y almacenar la url
    * donde se encuentra alamacenada esa imagen en nuestra BD PERO
    * AHY que tener en cuenta que la url no se va almacenar en la tabla
    * Course si no en la Tabla IMAGE para hacer eso crearemos un factory
    * para que lo maneje ImageFactory 
    */
    
    /**
    * solicitamos que se ejecute el Image::factory con el método factory 
    * debemos agregar al principio el modelo Image use App\Models\Image;
    * y le pedimos que nos genere 1 imagen (1) luego le paso el método 
    * create() y dentro le paso los valores de imageable_id y imageable_type
    * 
    */
    Image::factory(1)->create([
    'imageable_id' => $course->id,
    'imageable_type' => 'App\Models\Course'
    ]);
    
    /**
    * solicitamos que se ejecute el Requirement::factory con el método factory 
    * debemos agregar al principio el modelo Requirement use App\Models\Requirement;
    * y le pedimos que nos genere 4 requerimientos (4) luego le paso el método 
    * create() y dentro le paso el valore de course_id con lo del curso que estamos
    * 
    */
    Requirement::factory(4)->create([
    'course_id' => $course->id
    ]);
    
    /**
    * solicitamos que se ejecute el Goal::factory con el método factory 
    * debemos agregar al principio el modelo goal use App\Models\Goal;
    * y le pedimos que nos genere 4 objetivos (4) luego le paso el método 
    * create() y dentro le paso el valore de course_id con lo del curso que estamos
    * 
    */
    Goal::factory(4)->create([
    'course_id' => $course->id
    ]);
    
    /**
    * solicitamos que se ejecute el Audience::factory con el método factory 
    * debemos agregar al principio el modelo Audience use App\Models\Audience;
    * y le pedimos que nos genere 4 (4) luego le paso el método 
    * create() y dentro le paso el valore de course_id con lo del curso que estamos
    * 
    */
    Audience::factory(4)->create([
    'course_id' => $course->id
    ]);
    /**
    * Guardamos los valores en una variable $section luego 
    * solicitamos que se ejecute el Section::factory con el método factory 
    * debemos agregar al principio el modelo Section use App\Models\Section;
    * y le pedimos que nos genere 4 secciones (4) luego le paso el método 
    * create() y dentro le paso el valore de course_id con lo del curso que estamos
    * 
    */
    
    
    //Primero debo crear platform antes que las section
    
    $sections = Section::factory(4)->create(['course_id' => $course->id]);
    
    foreach ($sections as $section) {
    /**
    * Genera cuatro lecciones por cada sección
    */
    $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);
    
    foreach ($lessons as $lesson) {
    /**
    * Genera cuatro Descripciones por cada lección
    */
    Description::factory(1)->create(['lesson_id' => $lesson->id]);
    }
    }
    }
    }
    
}
