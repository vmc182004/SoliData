<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 1,
            'name' => 'Acceso a todos los informes',
            'micro2' => 1000000,
            'micro1' => 2000000,
            'pequeñas' => 3000000,
            'medianas' => 4000000,
            'grandes' => 5000000,
            'megas' => 6000000,
            'top' => 7000000,
            'description' => 'Compra TODOS los informes',
            'contenido'=> 'Tienes acceso a todos los informes',
            'image_path' => ''
        ]);

        Product::create([
            'id' => 2,
            'name' => 'Informe de prueba 1',
            'micro2' => 1000000,
            'micro1' => 2000000,
            'pequeñas' => 3000000,
            'medianas' => 4000000,
            'grandes' => 5000000,
            'megas' => 6000000,
            'top' => 7000000,
            'description' => 'Informe de prueba 1',
            'contenido'=> 'Informe de prueba 1',
            'image_path' => ''
        ]);
        Product::create([
            'id' => 3,
            'name' => 'Informe de prueba 2',
            'micro2' => 1000000,
            'micro1' => 2000000,
            'pequeñas' => 3000000,
            'medianas' => 4000000,
            'grandes' => 5000000,
            'megas' => 6000000,
            'top' => 7000000,
            'description' => 'Informe de prueba 2',
            'contenido'=> 'Informe de prueba 2',
            'image_path' => ''
        ]);
        Product::create([
            'id' => 4,
            'name' => 'Informe de prueba 3',
            'micro2' => 1000000,
            'micro1' => 2000000,
            'pequeñas' => 3000000,
            'medianas' => 4000000,
            'grandes' => 5000000,
            'megas' => 6000000,
            'top' => 7000000,
            'description' => 'Informe de prueba 3',
            'contenido'=> 'Informe de prueba 3',
            'image_path' => ''
        ]);
        Product::create([
            'id' => 5,
            'name' => 'Informe de prueba 4',
            'micro2' => 1000000,
            'micro1' => 2000000,
            'pequeñas' => 3000000,
            'medianas' => 4000000,
            'grandes' => 5000000,
            'megas' => 6000000,
            'top' => 7000000,
            'description' => 'Informe de prueba 4',
            'contenido'=> 'Informe de prueba 4',
            'image_path' => ''
        ]);



    }
}
