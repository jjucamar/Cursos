<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

// Importar modelos necesarios
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Price;

// importamos la clase Str para manejar el campo Slug
use Illuminate\Support\Str;



class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    /** para el campo title quiero que me generes una sentencia */
    $title = $this->faker->sentence();
    
    return [
    'title' => $title,
    /** para el campo subtitle quiero que me generes una sentencia */
    'subtitle' => $this->faker->sentence(),
    /** para el campo description quiero que me generes un parrafo */
    'description' => $this->faker->paragraph(),
    /** para el campo status quiero que sea llenado con tres posibles valores dentro de un array para cada uno llamamos al modelo Course y que me digas el valor de la constantes BORRADOR, REVISION, PUBLICADO */
    'status' => $this->faker->randomElement([
    Course::BORRADOR, Course::REVISION, Course::PUBLICADO
    ]),
    /**
    * Llamo a la clase Str accedo al metodo slug y dentro le pasamos el valor de la variable
    */
    'slug' => Str::slug($title),
    /**
    * para que hayan 5 instructotres en a plataforma de cursos, si deso solo 1 
    * 'user_id' => 1,
    * Si me sale un eroro con el mensaje de abajo 
    * Spatie\Permission\Exceptions\PermissionAlreadyExists
    * Solucion
    * https://stackoverflow.com/questions/61726194/spatie-permission-exceptions-permissionalreadyexists-a-edit-listing-permissi
    * */
    
    'user_id' => $this->faker->randomElement([1,2,3,4,5]),
    /**
    * Pedimos que nos rescate todos los Level registrado Level::all() para que 
    * funcione importo el modelo Level arriba, Luego quiero que me escoja uno al
    * azar random(), una vez escojido quiero si id 
    * 
    */
    'level_id' => Level::all()->random()->id,
    /**
    * Pedimos que nos rescate todos las categorias registradas Category::all() para que 
    * funcione importo el modelo Category arriba, Luego quiero que me escoja uno al
    * azar random(), una vez escojido quiero si id 
    * 
    */
    'category_id' => Category::all()->random()->id,
    /**
    * Pedimos que nos rescate todos los precios registradas Price::all() para que 
    * funcione importo el modelo Price arriba, Luego quiero que me escoja uno al
    * azar random(), una vez escojido quiero si id 
    * 
    */
    'price_id' => Price::all()->random()->id,
    ];
    }
    
    
}
