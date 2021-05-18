<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
public function definition()
{
return [
/** para el campo name quiero que me generes una sentencia */
'name' => $this->faker->sentence(),
/** para el url quiero que me lo llene todos con un video especifico */
'url' => 'https://youtu.be/DgDxAzbkOSs',
/** para el campo iframe quiero que me lo llene todos con un iframe especifico */
'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/DgDxAzbkOSs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
/** para el campo platform quiero que me lo llene todos con el 1 que es el identificado
* de Youtube */ 
'platform_id' => 1
];
}
}
