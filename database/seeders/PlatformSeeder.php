<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Importo el modelo
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /**
    * En este proyecto solo se van a poder visualizar los videos
    * de Youtube y vimeo
    */
    Platform::create([
    'name' => 'Youtube'
    ]);
    
    Platform::create([
    'name' => 'Vimeo'
    ]);
    }
}
