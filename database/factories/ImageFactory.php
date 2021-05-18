<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
return [
/**
* Descargar la imagen y guardarla en la carpeta public/storage/courses, 
* le pasamos el parametro de el ancho 640 el alto de 480 en la version de laravel 8
* las categoria ya no exite por eso ponemos NULL y un boleano, luego el valor de 
* alamcenamiento si es TRUE nos almacenara en la BD lo Siguiente
* /public/storage/course/imagen.jpg
* y si usamos false nos almacenara lo siguiente
* /imagen.jpg
* para este caso solo necesitamos que se almacene de la siguiente manera
* courses/imagen.jpg 
* Con lo cual concatemamos al principio
* 'courses/'. 
* 
* el nombre del archivo.
* faker no sabe crear carpetas lo tenemos que hacer en el DataBaseSeeder.php
* y utilizar el FACADES 
* 
*/
'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
/**
* Debemos pasarle el imageable_id y imageable_type 
* para pasarleo de forma dinmica lo hacemos desde el CourseSeeder
*/
];
}
}
