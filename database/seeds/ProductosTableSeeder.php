<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('categorias')->insert([
        	'categoria' => 'Estudio'
        ]);

        \DB::table('categorias')->insert([
        	'categoria' => 'Limpieza'
        ]);

        \DB::table('categorias')->insert([
        	'categoria' => 'Deportivo'
        ]);            	

        \DB::table('productos')->insert([
		    'nombre' => 'marcador',
		    'stock' => '20',
		    'codigo' => '001',
			'id_categoria' => 1
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'borrador',
		    'stock' => '30',
		    'codigo' => '002',
			'id_categoria' => 2
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'boligrafo',
		    'stock' => '20',
		    'codigo' => '003',
			'id_categoria' => 1
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'cintas',
		    'stock' => '30',
		    'codigo' => '004',
			'id_categoria' => 1
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'cloro',
		    'stock' => '3',
		    'codigo' => '010',
			'id_categoria' => 2
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'escoba',
		    'stock' => '2',
		    'codigo' => '020',
			'id_categoria' => 2
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'cepillos',
		    'stock' => '8',
		    'codigo' => '030',
			'id_categoria' => 2
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'coleto',
		    'stock' => '5',
		    'codigo' => '040',
			'id_categoria' => 2
		]);

        \DB::table('productos')->insert([
		    'nombre' => 'cera',
		    'stock' => '5',
		    'codigo' => '050',
			'id_categoria' => 2
		]);


    }
}
