<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 Material Deportivo

        //  2 Piezas de coche

        // 3 Piezas de PC


        DB::table('categorias')->insert(array(
            array(
                'id' => '1',
                'nombre' => 'Material Deportivo',
                'descripcion' => 'Artículos y ropa para hacer deporte',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ), 
            array(
                'id' => '2',
                'nombre' => 'Piezas de Coche',
                'descripcion' => 'Recambios de para vehículos',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ), 
            array(
                'id' => '3',
                'nombre' => 'Piezas de PC',
                'descripcion' => 'Harware para gaming , edición de video y ofimatica',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),              

        ));
    }
}
