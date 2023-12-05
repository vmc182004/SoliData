<?php

namespace Database\Seeders;
use App\Models\Icono;
use Illuminate\Database\Seeder;

class IconosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icono::create([
            'name_icono' => 'Mayor rentabilidad',
            'image_icono' => 'storage/imagenes_iconos/1698758916_1698336817_informe.png'
        ]);

        Icono::create([
            'name_icono' => 'Mayor eficiencia',
            'image_icono' => 'storage/imagenes_iconos/1698336988_eficiencia.png'
        ]);

        Icono::create([
            'name_icono' => 'Satisfaccion del cliente',
            'image_icono' => 'storage/imagenes_iconos/1698337016_satisfaccion.png'
        ]);

        Icono::create([
            'name_icono' => 'Atención al Cliente',
            'image_icono' => 'storage/imagenes_iconos/1698761623_1698337053_servicio-al-cliente.png'
        ]);
    }
}
