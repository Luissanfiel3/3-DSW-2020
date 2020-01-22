<?php

use Illuminate\Database\Seeder;

// Permite trabajar con fechas
use Carbon\Carbon;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserción de Base de datos 
        DB::table('productos')->insert(array(
            array(
                'nombre' => 'prod001',
                'descripcion' => 'Descripción del producto 1',
                'esactivo' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'categoria' => 'Planta'
            ),
            array(
                'nombre' => 'prod002',
                'descripcion' => 'Descripción del producto 2',
                'esactivo' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'categoria' => 'Objeto'
            ),
            array(
                'nombre' => 'prod003',
                'descripcion' => 'Descripción del producto 3',
                'esactivo' => 'N',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'categoria' => 'Tierra'
            ),
        ));
    }
}
