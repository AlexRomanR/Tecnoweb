<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Sueldo;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Función para generar sueldos aleatorios entre 2500 y 6000
        function generarSueldoAleatorio() {
            return rand(2500, 6000);
        }

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'adm@gmail.com',
            'ci' => '98716',
            'telefono' => '7789943',
            'direccion' => 'por ahí',
            'Postulante' => false,
            'Empleado' => true,
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        $sueldo = Sueldo::create([
            'sueldo_basico' => generarSueldoAleatorio(),
            'dias_pagados' => 24,
            'horas_diarias' => 8,
        ]);

        $empleado = Empleado::create([
            'ruta_imagen_e' => null,
            'ID_Cargo' => 1,
            'ID_Departamento' => 2,
            'fechanac' => '1990/07/01',
            'genero' => 'Masculino',
            'estadocivil' => 'Soltero',
            'ID_Sueldo' => $sueldo->id,
            'ID_Usuario' => $user->id,
        ]);

        $user = User::create([
            'name' => 'Encargado',
            'email' => 'encargado@gmail.com',
            'ci' => '84461',
            'telefono' => '7318578',
            'direccion' => 'plan 3000',
            'Postulante' => false,
            'Empleado' => true,
            'password' => bcrypt('12345678'),
        ])->assignRole('Encargado');

        $sueldo = Sueldo::create([
            'sueldo_basico' => generarSueldoAleatorio(),
            'dias_pagados' => 24,
            'horas_diarias' => 8,
        ]);

        $empleado = Empleado::create([
            'ruta_imagen_e' => null,
            'ID_Cargo' => 1,
            'ID_Departamento' => 2,
            'fechanac' => '1990/07/01',
            'genero' => 'Masculino',
            'estadocivil' => 'Soltero',
            'ID_Sueldo' => $sueldo->id,
            'ID_Usuario' => $user->id,
        ]);

        $user = User::create([
            'name' => 'Daniel',
            'email' => 'empleado@gmail.com',
            'ci' => '998941',
            'telefono' => '7284693',
            'direccion' => 'zona la cuchilla',
            'Postulante' => false,
            'Empleado' => true,
            'password' => bcrypt('12345678'),
        ])->assignRole('Empleado');

        $sueldo = Sueldo::create([
            'sueldo_basico' => generarSueldoAleatorio(),
            'dias_pagados' => 24,
            'horas_diarias' => 8,
        ]);

        $empleado = Empleado::create([
            'ruta_imagen_e' => null,
            'ID_Cargo' => 4,
            'ID_Departamento' => 2,
            'fechanac' => '1990/07/01',
            'genero' => 'Masculino',
            'estadocivil' => 'Soltero',
            'ID_Sueldo' => $sueldo->id,
            'ID_Usuario' => $user->id,
        ]);

        $user = User::create([
            'name' => 'Fernando',
            'email' => 'empleado3@gmail.com',
            'ci' => '918941',
            'telefono' => '7284693',
            'direccion' => 'zona la cuchilla',
            'Postulante' => false,
            'Empleado' => true,
            'password' => bcrypt('12345678'),
        ])->assignRole('Empleado');

        $sueldo = Sueldo::create([
            'sueldo_basico' => generarSueldoAleatorio(),
            'dias_pagados' => 24,
            'horas_diarias' => 8,
        ]);

        $empleado = Empleado::create([
            'ID_Cargo' => 1,
            'ID_Departamento' => 1,
            'fechanac' => '1990/07/01',
            'genero' => 'Masculino',
            'estadocivil' => 'Soltero',
            'ID_Sueldo' => $sueldo->id,
            'ID_Usuario' => $user->id,
        ]);
    }
}
