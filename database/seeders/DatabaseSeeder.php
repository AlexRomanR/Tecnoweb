<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(DiaTrabajoSeeder::class);
        $this->call(HorarioEmpleadoSeeder::class);
        $this->call(Puesto_DisponibleSeeder::class);
        $this->call(PostulanteSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(Fuente_De_ContratacionSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(Nivel_IdiomaSeeder::class);
        $this->call(DepositoSeeder::class);
        $this->call(ActividadSeeder::class);
        $this->call(AsistenciasSeeder::class);
        $this->call(Dias_Festivos_Seeder::class);
        $this->call(LlamadaSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
