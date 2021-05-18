<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// importo el Facades para crear Carpetas
use Illuminate\Support\Facades\Storage;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
  


public function run()
{
/**
* Esto sera lo primero que se hace
* Lo primero que hare es confirmar que la carpeta este vacia y lo logro 
* si esta creada la elimino y luego la creo.
* 
* Llamo al metodo Sorage y accedo al metodo makeDirectory() Dentro del metodo
* especifico la carpeta que deseo crear me genera la carpeta dentro de 
* Public/Storage 
*/

Storage::deleteDirectory('courses');
Storage::makeDirectory('courses');

// $this->call(PermissonSeeder::class);
// $this->call(RoleSeeders::class);
$this->call(UserSeeder::class);
$this->call(LevelSeeder::class);
$this->call(CategorySeeder::class);
$this->call(PriceSeeder::class);
$this->call(PlatformSeeder::class);
$this->call(CourseSeeder::class);
}

}
