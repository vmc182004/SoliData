<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProductsTableSeeder::class);
        $this->call(CarruselTableSeeder::class);
        $this->call(IconosTableSeeder::class);
        $this->call(ContenidoTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BoletinTableSeeder::class);
        
    }
}
