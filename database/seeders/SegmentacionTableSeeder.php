<?php

namespace Database\Seeders;

use App\Models\Segmentacion;
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
        //
        Segmentacion:: create ([
            'nameSegmentacion' => 'micro2',
            'tipo_entidad_id' => 1,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'micro1',
            'tipo_entidad_id' => 2,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'pequeñas',
            'tipo_entidad_id' => 3,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'medianas',
            'tipo_entidad_id' => 4,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'grande',
            'tipo_entidad_id' => 1,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'megas',
            'tipo_entidad_id' => 2,
        ]);
        Segmentacion:: create ([
            'nameSegmentacion' => 'top',
            'tipo_entidad_id' => 3,
        ]);
    }
}
