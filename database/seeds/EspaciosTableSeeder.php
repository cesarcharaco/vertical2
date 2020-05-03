<?php

use Illuminate\Database\Seeder;

class EspaciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        	\DB::table('espacios')->insert([
        		'espacio' => 'Parque infantil',
        		'piso' => '1',
                'limite_personas' => 100

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Auditorio',
        		'piso' => '1',
                'limite_personas' => 200

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Infocentro',
        		'piso' => '1',
                'limite_personas' => 50

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Ginnasio',
        		'piso' => '2',
                'limite_personas' => 50

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Deportes',
        		'piso' => '3',
                'limite_personas' => 100

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Cultura',
        		'piso' => '4',
                'limite_personas' => 100

        	]);

        	\DB::table('espacios')->insert([
        		'espacio' => 'Cancha deportiva',
        		'piso' => '5',
                'limite_personas' => 150

        	]);


    }
}
