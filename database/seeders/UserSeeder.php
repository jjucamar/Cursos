<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// llamo al modelo User
use App\Models\User;
use PhpParser\Node\Expr\Assign;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ingreso de registros manualmente
         * 
         * usuario con las credenciales especificas para poder
         * logearnos
         * 
         *  */ 
        
       $user = User::create([
            'name' => 'Juan Camilo Martinez',
            'email' => 'jc@jc.com',
            // encriptamos la contraseña
            'password' => bcrypt('123456789')
        ]);
    
        // Cantidad de usuarios que se crearan llamara al factory
        User::factory(99)->create();
    }
}
