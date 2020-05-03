<?php

use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//primero registros de cargos
        
        \DB::table('cargos')->insert([
        	'cargo' => 'Administrador'
        ]);
    	\DB::table('cargos')->insert([
        	'cargo' => 'Jefe de Departamento'
        ]);
        \DB::table('cargos')->insert([
        	'cargo' => 'Recepcionista'
        ]);	
        \DB::table('cargos')->insert([
        	'cargo' => 'Secretaria(o)'
        ]);
        \DB::table('cargos')->insert([
        	'cargo' => 'Asistente'
        ]);
        \DB::table('cargos')->insert([
        	'cargo' => 'Bedel'
        ]);
        \DB::table('cargos')->insert([
        	'cargo' => 'Cocinera(o)'
        ]);
        \DB::table('cargos')->insert([
        	'cargo' => 'Recepcionista'
        ]);
    	//------------------------------
    	// registro de empleados
        \DB::table('empleados')->insert([
        	'nombres' => 'José Luis',
        	'apellidos' => 'Merchan',
        	'nacionalidad' => 'V',
            'cedula' =>'1247878',
            'correo' => 'josemerchan@vertical.com',
            'movil' => '04122342342',
            'local' => '02443453453',
            'id_cargo' =>  2,
            'created_at' => '2019-09-09 22:47:59'
        ]);

		\DB::table('empleados')->insert([
        	'nombres' => 'Ronald',
        	'apellidos' => 'Ramirez',
        	'nacionalidad' => 'V',
            'cedula' =>'27167436',
            'correo' => 'ronaldr_ramirezg@gmail.com',
            'movil' => '04142738268',
            'local' => '02443953167',
            'id_cargo' => 3,
            'created_at' => '2019-08-02 22:47:59'
        ]);

		\DB::table('empleados')->insert([
        	'nombres' => 'Manuel',
        	'apellidos' => 'Alejandro',
        	'nacionalidad' => 'V',
            'cedula' =>'21368926',
            'correo' => 'manual.ramiez@gmail.com',
            'movil' => '04123324324',
            'local' => '0243424234',
            'id_cargo' => 4,
            'created_at' => '2019-03-01 22:47:59'
        ]);


		\DB::table('empleados')->insert([
        	'nombres' => 'Mary',
        	'apellidos' => 'Corina',
        	'nacionalidad' => 'V',
            'cedula' =>'953242332',
            'correo' => '1002wq@gmail.com',
            'movil' => '0323232323',
            'local' => '332323320',
            'id_cargo' => 5,
            'created_at' => '2019-05-11 22:47:59'
        ]);


		\DB::table('empleados')->insert([
        	'nombres' => 'juan pablo',
        	'apellidos' => 'perez',
        	'nacionalidad' => 'V',
            'cedula' =>'19269208',
            'correo' => 'juan@gmail.com',
            'movil' => '4169691208',
            'local' => '02443211510',
            'id_cargo' => 6,
            'created_at' => '2019-04-15 22:47:59'
        ]);

		\DB::table('empleados')->insert([
        	'nombres' => 'lisandro manuel',
        	'apellidos' => 'rondon cabeza',
        	'nacionalidad' => 'V',
            'cedula' =>'10356019',
            'correo' => 'lisando@gmail.com',
            'movil' => '04261678199',
            'local' => '332323320',
            'id_cargo' => 7,
            'created_at' => '2019-02-09 22:47:59'
        ]);

		\DB::table('empleados')->insert([
        	'nombres' => 'andy jose',
        	'apellidos' => 'perez greiner',
        	'nacionalidad' => 'V',
            'cedula' =>'19569208',
            'correo' => 'andy@gmail.com',
            'movil' => '04121484508',
            'local' => '02443215067',
            'id_cargo' => 8,
            'created_at' => '2019-04-19 22:47:59'
        ]);		

		    }
		}
