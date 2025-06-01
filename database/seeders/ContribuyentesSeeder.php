<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contribuyente;

class ContribuyentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contribuyentes = [
            ['id' => 1, 'tipo_contribuyente' => 'GRANDE CONTRIBUYENTE', 'estado' => '1'],
            ['id' => 2, 'tipo_contribuyente' => 'MEDIANO CONTRIBUYENTE', 'estado' => '1'],
            ['id' => 3, 'tipo_contribuyente' => 'OTRO CONTRIBUYENTE', 'estado' => '1'],
        ];
        foreach ($contribuyentes as $contri) {
            Contribuyente::create($contri);
        }
    }
}
