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
        $this->call([
            PaisesSeeder::class,
            DepartamentosSeeder::class,
            MunicipiossSeeder::class,
            ContribuyentesSeeder::class,
            DocumentosSeeder::class,
            ActividadSeeder::class
        ]);
    }
}
