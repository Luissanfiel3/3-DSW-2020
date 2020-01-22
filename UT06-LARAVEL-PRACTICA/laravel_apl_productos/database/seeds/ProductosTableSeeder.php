<?php

use Illuminate\Database\Seeder;

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
        //Insertamos los registros de nuestra tabla

        DB::table('productos')->insert(array(
            array(
                'id'=> '1',
                'nombre' => 'V6 3.8T',
                'descripcion' => 'Motor de competición 700HP',
                'esactivo' => 'Y',
                'categoria_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ),
            array(
                'id'=> '2',
                'nombre' => 'Botas fe Football',
                'descripcion' => 'Botas de tacos  de aluminio',
                'esactivo' => 'N',
                'categoria_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '3',
                'nombre' => 'Aléron Competición',
                'descripcion' => 'Alerón de fibra de carbono',
                'esactivo' => 'N',
                'categoria_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '4',
                'nombre' => 'Tarjeta Gráfica',
                'descripcion' => 'Especial para jugar en 4K',
                'esactivo' => 'Y',
                'categoria_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '5',
                'nombre' => 'Camisa de Entrenamiento',
                'descripcion' => 'Camisa para usar en GYM',
                'esactivo' => 'Y',
                'categoria_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '6',
                'nombre' => 'Memoria RAM',
                'descripcion' => 'Memoria DDR4 2400 Mhz',
                'esactivo' => 'N',
                'categoria_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '7',
                'nombre' => 'Jaula Antivuelco',
                'descripcion' => 'Equipos informáticos',
                'esactivo' => 'Y',
                'categoria_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '8',
                'nombre' => 'Zapatos Runing',
                'descripcion' => 'Zapatos especiales para carreras de montaña',
                'esactivo' => 'Y',
                'categoria_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '9',
                'nombre' => 'Intel i9',
                'descripcion' => 'Procesador de 8 núcleos',
                'esactivo' => 'Y',
                'categoria_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'id'=> '10',
                'nombre' => 'Caja PDK',
                'descripcion' => 'Caja de velocidad secuencial de 7V',
                'esactivo' => 'Y',
                'categoria_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),

        ));
    }
}
