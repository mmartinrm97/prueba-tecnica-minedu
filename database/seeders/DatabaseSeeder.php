<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EstadoDocente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         EstadoDocente::factory()->create([
             'descripcion' => 'Docente registrado',
         ]);

        EstadoDocente::factory()->create([
            'descripcion' => 'Docente actualizado ',
        ]);
        EstadoDocente::factory()->create([
            'descripcion' => 'Docente eliminado',
        ]);
    }
}
