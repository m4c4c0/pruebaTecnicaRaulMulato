<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = [
            ['id' => 1, 'departamento' => 'Ahuachapán', 'cod_mh_departamento' => '01', 'estado' => '1'],
            ['id' => 2, 'departamento' => 'Santa Ana', 'cod_mh_departamento' => '02', 'estado' => '1'],
            ['id' => 3, 'departamento' => 'Sonsonate', 'cod_mh_departamento' => '03', 'estado' => '1'],
            ['id' => 4, 'departamento' => 'Chalatenango', 'cod_mh_departamento' => '04', 'estado' => '1'],
            ['id' => 5, 'departamento' => 'La Libertad', 'cod_mh_departamento' => '05', 'estado' => '1'],
            ['id' => 6, 'departamento' => 'San Salvador', 'cod_mh_departamento' => '06', 'estado' => '1'],
            ['id' => 7, 'departamento' => 'Cuscatlán', 'cod_mh_departamento' => '07', 'estado' => '1'],
            ['id' => 8, 'departamento' => 'La Paz', 'cod_mh_departamento' => '08', 'estado' => '1'],
            ['id' => 9, 'departamento' => 'Cabañas', 'cod_mh_departamento' => '09', 'estado' => '1'],
            ['id' => 10, 'departamento' => 'San Vicente', 'cod_mh_departamento' => '10', 'estado' => '1'],
            ['id' => 11, 'departamento' => 'Usulután', 'cod_mh_departamento' => '11', 'estado' => '1'],
            ['id' => 12, 'departamento' => 'San Miguel', 'cod_mh_departamento' => '12', 'estado' => '1'],
            ['id' => 13, 'departamento' => 'Morazán', 'cod_mh_departamento' => '13', 'estado' => '1'],
            ['id' => 14, 'departamento' => 'La Unión', 'cod_mh_departamento' => '14', 'estado' => '1'],
            
        ];

        foreach ($departamentos as $dep) {
            Departamento::create($dep);
        }
    }
}
