<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documento;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Documentos = [
            [
                'id' => 1,
                'tipo_documento' => 'NIT',
                'cod_tipo_documento' => '36',
                'estado' => '1',
            ],
            [
                'id' => 2,
                'tipo_documento' => 'DUI',
                'cod_tipo_documento' => '13',
                'estado' => '1',
            ],
            [
                'id' => 3,
                'tipo_documento' => 'DUI HOMOLOGADO',
                'cod_tipo_documento' => '36',
                'estado' => '1',
            ],
            [
                'id' => 4,
                'tipo_documento' => 'Otro',
                'cod_tipo_documento' => '37',
                'estado' => '1',
            ],
        ];
        foreach ($Documentos as $doc) {
            Documento::create($doc);
        }
    }
}
