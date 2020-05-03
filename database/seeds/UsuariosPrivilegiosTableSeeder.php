<?php

use Illuminate\Database\Seeder;

class UsuariosPrivilegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*for ($i=1; $i <=4 ; $i++) { 
        	# code...*/
        	for ($j=1; $j <=120 ; $j++) { 
        		# code...

       		\DB::table('usuarios_has_privilegios')->insert([
        	'id_usuario' => 1,
        	'id_privilegio' => $j
			]);

        	}
        //}
//agregando privilegios al usuario 2
            // vertical
                        //empleados
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => 1
                    ]);
                    for ($i=6; $i <= 8; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => $i
                    ]);
                   }
                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => 33
                    ]);
                    for ($i=38; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => $i
                    ]);
                   }

                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => 97
                    ]);
                    for ($i=102; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => $i
                    ]);
                   }
                   // mantentenimiento clientes
                    for ($i=81; $i <= 82; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => $i
                    ]);
                   }
                   for ($i=85; $i <= 88; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 2,
                        'id_privilegio' => $i
                    ]);
                   }

//agregando privilegios al usuario 3

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 1
                    ]);
                    for ($i=6; $i <= 8; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }
                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 33
                    ]);
                    for ($i=38; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }

                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 97
                    ]);
                    for ($i=102; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }

                   //mantenimiento - cargos

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 65
                    ]);
                    for ($i=66; $i <= 72; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }

                   //asistencias

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 105
                    ]);
                    for ($i=106; $i <= 112; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }  

                   //visitas

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => 89
                    ]);
                    for ($i=90; $i <= 96; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => 3,
                        'id_privilegio' => $i
                    ]);
                   }


    }//fin de la funcion
}//fin de la clase

