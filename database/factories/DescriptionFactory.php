<?php

namespace Database\Factories;

use App\Models\Description;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Description::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
 
public function definition()
{
return [
/**
* que faker me genere una parrafo, 
* el Lesson_ID se genera automaticamente en el CourseSeeder
*/
'name' => $this->faker->paragraph()
];
}

}
