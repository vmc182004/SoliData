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
            'id' => '1',
            'nameEntidad' => 'Ahorro y credito'
        ]);
        TipoEntidad::create([
            'id' => '2',
            'nameEntidad' => 'Cooperativa sin ahorro'
        ]);
        TipoEntidad::create([
            'id' => '3',
            'nameEntidad' => 'Fondos de empleados'
        ]);
        TipoEntidad::create([
            'id' => '4',
            'nameEntidad' => 'Mutuales'
        ]);
        TipoEntidad::create([
            'id' => '5',
            'nameEntidad' => 'Cooperativa y otros'
        ]);
    }
}
