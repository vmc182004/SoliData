<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use create;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        $csv = Reader::createFromPath(public_path('excel/tecnoparques.csv'), 'r');
        $csv->setHeaderOffset(0); // Si el archivo tiene encabezados

        $seeders = $csv->getRecords();

        $segmentacionIdAleatorio = rand(1, 7);
        foreach ($seeders as $record) {
            // Aquí deberías adaptar esto a tu estructura de datos y modelo
            Cliente::create([
                'nameEmpresa' => $record['nameEmpresa'],
                'nitEmpresa' => $record['nitEmpresa'],
                'emailEmpresa' => $record['emailEmpresa'],
                'activos' => $record['activos'],
                'segmentacion_id' => $segmentacionIdAleatorio,
                // ... y así sucesivamente con los campos del CSV
            ]);
        }

        return redirect()->back()->with('success', 'Seeders importados correctamente');
    }
}
