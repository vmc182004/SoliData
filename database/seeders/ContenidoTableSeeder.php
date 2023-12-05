<?php

namespace Database\Seeders;
use App\Models\Contenido;
use Illuminate\Database\Seeder;

class ContenidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contenido::create([
            'titulo_contenido' => 'Analítica Solidaria',
            'texto_contenido' => 'Luego de estar en el sector cooperativista por más cinco años creando y gestionando los diferentes sistemas de riesgos en algunas de las entidades solidarias más importantes del país, y viendo la necesidad apremiante en muchas entidades de desarrollar y mejorar los sistemas de riesgos, nace como respuesta para satisfacer esa necesidad ANALÍTICA SOLIDARIA',
            'name_boton' => 'NOSOTROS',
            'image_contenido' => 'storage/imagenes_contenido/1698351190_image32.png'
        ]);
    }
}
