<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Segmentacion;
use App\Models\TipoEntidad;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use create;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        $tipoEntidades = TipoEntidad::get();
        $csv = Reader::createFromPath(public_path('excel/tecnoparques.csv'), 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $seeders = $csv->getRecords();

        foreach($seeders as $dato){
            foreach($tipoEntidades as $tipoEntidad){
                if($dato['tipoEntidad'] === $tipoEntidad->nameEntidad){
                    $segmentaciones = Segmentacion::where('tipo_entidad_id', $tipoEntidad->id)
                        ->get();
                    foreach($segmentaciones as $segmentacion){
                        if($dato['activos'] > $segmentacion->mayor and $segmentacion->menor === NULL){
                            $idSegmentacion = $segmentacion->id;
                        }else if($dato['activos'] > $segmentacion->mayor and $dato['activos'] < $segmentacion->menor){
                            $idSegmentacion = $segmentacion->id;
                        }

                    }
                }
            }
            Cliente::create([
                'nameEmpresa' => $dato['nameEmpresa'],
                'nitEmpresa' => $dato['nitEmpresa'],
                'emailEmpresa' => $dato['emailEmpresa'],
                'activos' => $dato['activos'],
                'segmentacion_id' => $idSegmentacion,
                // ... y así sucesivamente con los campos del CSV
            ]);
        }

        return redirect()->back()->with('success', 'Seeders importados correctamente');
    }
}
