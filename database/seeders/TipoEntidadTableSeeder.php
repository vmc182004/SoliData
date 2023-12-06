<?php

namespace Database\Seeders;

use App\Models\TipoEntidad;
use Illuminate\Database\Seeder;

class TipoEntidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoEntidad::create([
            'nameEntidad' => 'Especializadas'
        ]);
        TipoEntidad::create([
            'nameEntidad' => 'Fondosdeempleados'
        ]);
        TipoEntidad::create([
            'nameEntidad' => 'Mutuales'
        ]);
        TipoEntidad::create([
            'nameEntidad' => 'Cooperativasyotras'
        ]);
    }
}
