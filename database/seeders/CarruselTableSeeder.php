<?php

namespace Database\Seeders;
use App\Models\Carrusel;
use Illuminate\Database\Seeder;

class CarruselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrusel::create([
            'titulo_carrusel' => 'Prueba',
            'texto_carrusel' => 'jeje',
            'fecha_carrusel' => '2023-10-20',
            'image_carrusel'=> 'storage/imagenes_carrusel/1698954309_WhatsApp Image 2023-08-11 at 9.52.10 AM.jpeg'
        ]);
    }
}
