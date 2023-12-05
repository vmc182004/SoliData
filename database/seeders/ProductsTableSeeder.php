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
            'id' => 999,
            'name' => 'Acceso a todos los informes',
            'minPrice' => 100000,
            'maxPrice' => 200000,
            'description' => 'Compra TODOS los informes',
            'contenido'=> 'Tienes acceso a todos los informes',
            'image_path' => ''
        ]);

        

    }
}
