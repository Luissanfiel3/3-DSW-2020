<?php

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
        // Añadimos la carga de todos los campos de la tabla
       $this->call(ProductosTableSeeder::class);
       $this->command->info('productos table seeded!');
    }
}
