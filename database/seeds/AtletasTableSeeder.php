<?php

use Illuminate\Database\Seeder;

class AtletasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('atletas')->insert([
        	'nombres' => 'Jose Ramon',
        	'apellidos' => 'rondon cabeza',
        	'nacionalidad' => 'V',
            'cedula' =>'8556155'
		]);

            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 1,
                    'id_producto' => 1,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Manuel Martinez',
        	'apellidos' => 'Martinez Perez',
        	'nacionalidad' => 'V',
            'cedula' =>'21368926'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 2,
                    'id_producto' => 2,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Marco Antonio',
        	'apellidos' => 'Calcurian',
        	'nacionalidad' => 'V',
            'cedula' =>'19268209'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 3,
                    'id_producto' => 3,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Rosnel Leal',
        	'apellidos' => 'Martinez leal',
        	'nacionalidad' => 'V',
            'cedula' =>'20265313'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 4,
                    'id_producto' => 2,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Jhosmzary Mujica',
        	'apellidos' => ' Greiner Perez',
        	'nacionalidad' => 'V',
            'cedula' =>'8691081'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 5,
                    'id_producto' => 1,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Rafael Antonio',
        	'apellidos' => ' Perez ',
        	'nacionalidad' => 'V',
            'cedula' =>'12000442'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 6,
                    'id_producto' => 4,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Moises Alberto',
        	'apellidos' => 'Perez',
        	'nacionalidad' => 'V',
            'cedula' =>'21368889'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 7,
                    'id_producto' => 5,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Jhony Jose',
        	'apellidos' => 'Alvarez',
        	'nacionalidad' => 'V',
            'cedula' =>'27049120'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 8,
                    'id_producto' => 1,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Jesus Eduardo',
        	'apellidos' => 'Mendez Torrealba',
        	'nacionalidad' => 'V',
            'cedula' =>'8691081'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 9,
                    'id_producto' => 5,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }

        \DB::table('atletas')->insert([
        	'nombres' => 'Luis Maubricio',
        	'apellidos' => 'Jimenez Tello',
        	'nacionalidad' => 'V',
            'cedula' =>'8819522'
		]);
            for ($j=1; $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => 10,
                    'id_producto' => 3,
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }


    }
}
