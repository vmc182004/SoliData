<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombreEmpresa' => 'S.A.S Amariles',
            'nitEmpresa' => '888.999.011',
            'activos' => '5000000'
        ]);
    }
}
