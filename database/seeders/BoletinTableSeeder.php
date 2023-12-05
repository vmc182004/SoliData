<?php

namespace Database\Seeders;
use App\Models\Boletine;
use Illuminate\Database\Seeder;

class BoletinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Boletine::create([
            'titulo_boletin' => 'BOLETÍN',
            'texto_boletin' => '¿Desea recibir informacion de Analitica Solidaria en su correo? ',
            'nombreBoton_boletin' => 'Suscribirse',
            'año_boletin'=> '2023',
            'image_boletin' => 'storage/imagenes_boletine/1698865058_boletin.PNG',
            'icono_boletin' => 'storage/imagenes_boletine/1698864711_gratis-png-iconos-de-computadora-campana-youtube-icono-de-campana-thumbnail-removebg-preview.png'
        ]);

    }
}
