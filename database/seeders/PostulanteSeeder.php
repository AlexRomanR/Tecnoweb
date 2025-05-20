<?php

namespace Database\Seeders;

use App\Models\Postulante;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostulanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'postulante1',
            'email' => 'post@gmail.com',
            
            'ci' => '1213123',
            'telefono' => '13223',
            'direccion' => 'plan 3000',        
            'Postulante' => true,         
            'password' => bcrypt('12345678')
        ])->assignRole('Postulante');

        $postulante = new Postulante([
           
            'ruta_imagen_e' => '/build/imagenes/utilitarios/veterinario2.jpg',
            'fecha_de_nacimiento' => '2023-04-01',
            'nacionalidad' => 'Boliviano',
            'habilidades' => 'Ninguna Xd',
            'ID_Fuente_De_Contratacion' => null,
            'ID_Puesto_Disponible' => null,
        ]);

        $user->postulante()->save($postulante);
    }
}
