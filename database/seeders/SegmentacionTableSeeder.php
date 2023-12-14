<?php

namespace Database\Seeders;

use App\Models\Segmentacion;
use League\Csv\Reader;
use Illuminate\Database\Seeder;

class SegmentacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(public_path('excel/segmentacioness.csv'), 'r');
        $csv->setHeaderOffset(0); // Si el archivo tiene encabezados

        $seeders = $csv->getRecords();

        foreach ($seeders as $record) {
            // Aquí deberías adaptar esto a tu estructura de datos y modelo
            $mayor = $record['mayor'];
            $menor = $record['menor'];
            if($mayor === ''){
                $mayor = NULL;
            }
            if($menor === ''){
                $menor = NULL;
            }
            Segmentacion::create([
                'nameSegmentacion' => $record['nameSegmentacion'],
                'mayor' => $mayor,
                'menor' => $menor,
                'tipo_entidad_id' => $record['tipo_entidad_id'],
                // ... y así sucesivamente con los campos del CSV
            ]);
        }

        return redirect()->back()->with('success', 'Seeders importados correctamente');
    }
    
}
