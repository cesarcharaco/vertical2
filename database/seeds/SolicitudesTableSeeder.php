<?php

use Illuminate\Database\Seeder;

class SolicitudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 1,
				'id_espacio' => 1,
				'num_bloques' => 2,
				'dirigido' => 'Niños',
				'nombre_actividad' => 'Cumpleaños',
				'responsable' => 'Pepe',
				'permanente' => 'No',
				'fecha' => '2019-07-15',
				'descripcion_actividad' => 'Para diversion',
				'num_asistentes' => 20,
				'id_cliente' => 1
        	]);
        	\DB::table('clientes_has_productos')->insert([
        		'id_producto' => 1,
        		'status' => 'Pendiente',
        		'cantidad' => 5,
        		'id_solicitud' => 1

        	]);



        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 2,
				'id_espacio' => 1,
				'num_bloques' => 2,
				'dirigido' => 'Adolecentes',
				'nombre_actividad' => 'Charlas',
				'responsable' => 'Antonio',
				'permanente' => 'No',
				'fecha' => '2019-07-16',
				'descripcion_actividad' => 'Dia del abuelo ',
				'num_asistentes' => 40,
				'id_cliente' => 2
        	]);
        	\DB::table('clientes_has_productos')->insert([
        		'id_producto' => 2,
        		'status' => 'Pendiente',
        		'cantidad' => 7,
        		'id_solicitud' => 2
        	]);

        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 3,
				'id_espacio' => 1,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Diversion',
				'responsable' => 'Jose',
				'permanente' => 'No',
				'fecha' => '2019-07-17',
				'descripcion_actividad' => 'Para Cumpleaños',
				'num_asistentes' => 10,
				'id_cliente' => 3

        	]);
        	\DB::table('clientes_has_productos')->insert([
        		'id_producto' => 3,
        		'status' => 'Pendiente',
        		'cantidad' => 3,
        		'id_solicitud' => 3        	
        	]);

        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 3,
				'id_espacio' => 5,
				'num_bloques' => 3,
				'dirigido' => 'Jovenes',
				'nombre_actividad' => 'Evento deportivo',
				'responsable' => 'rafael',
				'permanente' => 'No',
				'fecha' => '2019-07-17',
				'descripcion_actividad' => 'Actividad de baloncesto',
				'num_asistentes' => 10,
				'id_cliente' => 5

        	]);


        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 3,
				'id_espacio' => 5,
				'num_bloques' => 3,
				'dirigido' => 'Jovenes',
				'nombre_actividad' => 'Evento deportivo',
				'responsable' => 'Moises',
				'permanente' => 'No',
				'fecha' => '2019-07-17',
				'descripcion_actividad' => 'Actividad de futbol',
				'num_asistentes' => 10,
				'id_cliente' => 6

        	]);

        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 3,
				'id_espacio' => 6,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Danza de Baile ',
				'responsable' => 'Zuleima',
				'permanente' => 'No',
				'fecha' => '2019-07-17',
				'descripcion_actividad' => 'Danza de baile llanero',
				'num_asistentes' => 10,
				'id_cliente' => 7

        	]);
        	//---------------------APROBADAS---------------------
        	//--------- solicitud para el espacio Parque Infantil---
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 1,
				'id_espacio' => 1,
				'num_bloques' => 2,
				'dirigido' => 'Niños menores iguales a 6 años',
				'nombre_actividad' => 'Artes Plásticas ',
				'responsable' => 'Rosnely',
				'permanente' => 'Si',
				'fecha' => '2019-07-01',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Danza de baile llanero',
				'num_asistentes' => 10,
				'id_cliente' => 7

        	]);
        	$id=1;
        	for ($i=0; $i <2 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 7,
        		'id_espacio' => 1,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#FFA07A'
        	]);
        		$id+=7;
        	}
        	//-------- solicitud para el espacio Parque Infantil----
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 39,
				'id_espacio' => 1,
				'num_bloques' => 4,
				'dirigido' => 'Niños menores iguales a 6 años',
				'nombre_actividad' => 'Recreación ',
				'responsable' => 'Rosnely',
				'permanente' => 'Si',
				'fecha' => '2019-07-03',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Recreación',
				'num_asistentes' => 10,
				'id_cliente' => 7

        	]);
        	$id=39;
        	for ($i=0; $i <4 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 8,
        		'id_espacio' => 1,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#90EE90'
        	]);
        		$id+=7;
        	}
        	//--------- solicitud de espacio Infocentro-----
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 38,
				'id_espacio' => 3,
				'num_bloques' => 4,
				'dirigido' => 'Estudiantes de Bachillerato',
				'nombre_actividad' => 'Curso de Reparación de Canaimas',
				'responsable' => 'Luis',
				'permanente' => 'Si',
				'fecha' => '2019-07-02',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Curso de Reparación de Canaimas',
				'num_asistentes' => 15,
				'id_cliente' => 8

        	]);
        	$id=38;
        	for ($i=0; $i <4 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 9,
        		'id_espacio' => 3,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#FFDEAD'

        	]);
        		$id+=7;
        	}
        	//--------- solicitud de espacio de Infocentro-----
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 6,
				'id_espacio' => 3,
				'num_bloques' => 5,
				'dirigido' => 'Estudiantes de Bachillerato',
				'nombre_actividad' => 'Curso de OpenOffice',
				'responsable' => 'Luis',
				'permanente' => 'Si',
				'fecha' => '2019-07-06',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Curso de OpenOffice',
				'num_asistentes' => 15,
				'id_cliente' => 8

        	]);
        	$id=6;
        	for ($i=0; $i <5 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 10,
        		'id_espacio' => 3,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#FF7F50'
        	]);
        		$id+=7;
        	}

        	//--------- solicitud de Espacio de Auditorio-----
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 40,
				'id_espacio' => 2,
				'num_bloques' => 4,
				'dirigido' => 'Adultos y Jovenes',
				'nombre_actividad' => 'Presentación de la Pagina Patria',
				'responsable' => 'Daniela',
				'permanente' => 'Si',
				'fecha' => '2019-07-04',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Presentación de la Pagina Patria',
				'num_asistentes' => 40,
				'id_cliente' => 6

        	]);
        	$id=40;
        	for ($i=0; $i <4 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 11,
        		'id_espacio' => 2,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#66CDAA'
        	]);
        		$id+=7;
        	}

        	//--------- solicitud de Espacio de Auditorio-----
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 5,
				'id_espacio' => 2,
				'num_bloques' => 5,
				'dirigido' => 'Adultos y Jovenes',
				'nombre_actividad' => 'Orientación Consejos Comunales',
				'responsable' => 'Daniela',
				'permanente' => 'Si',
				'fecha' => '2019-07-05',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Orientación para actividades de Gestión en Consejos Comunales',
				'num_asistentes' => 40,
				'id_cliente' => 6

        	]);
        	$id=5;
        	for ($i=0; $i <5 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 12,
        		'id_espacio' => 2,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#FFF8DC'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio Gimnasio-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 44,
				'id_espacio' => 4,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Entrenamiento De Fisico',
				'responsable' => 'Rafael',
				'permanente' => 'Si',
				'fecha' => '2019-07-02',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Entrenamiento de Cardio',
				'num_asistentes' => 30,
				'id_cliente' => 4

        	]);
        	$id=44;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 13,
        		'id_espacio' => 4,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#87CEFA'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio Gimnasio-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 45,
				'id_espacio' => 4,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Entrenamiento De Fisico',
				'responsable' => 'Rafael',
				'permanente' => 'Si',
				'fecha' => '2019-07-05',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Entrenamiento con Pesas',
				'num_asistentes' => 30,
				'id_cliente' => 4

        	]);
        	$id=45;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 14,
        		'id_espacio' => 4,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#B0C4DE'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio Deportes-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 14,
				'id_espacio' => 5,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Practicas de Boxeo ',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-02',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Rutinas de Boxeo',
				'num_asistentes' => 30,
				'id_cliente' => 5

        	]);
        	$id=14;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 15,
        		'id_espacio' => 5,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#FF8C00'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio Deportes-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 14,
				'id_espacio' => 5,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Practicas de Gimnasia Artistica ',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-05',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Rutinas de Gimnasia',
				'num_asistentes' => 25,
				'id_cliente' => 5

        	]);
        	$id=14;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 16,
        		'id_espacio' => 5,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#98FB98'
        	]);
        		$id+=7;
        	}


        //------- solicitud espacio Cultura-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 14,
				'id_espacio' => 6,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Presentación de Danza',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-01',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Danza de Bailes Artistico',
				'num_asistentes' => 15,
				'id_cliente' => 5

        	]);
        	$id=14;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 17,
        		'id_espacio' => 6,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#E6E6FA'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio Cultura-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 15,
				'id_espacio' => 6,
				'num_bloques' => 3,
				'dirigido' => 'Adultos',
				'nombre_actividad' => 'Presentación de baile Llanero',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-03',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Coreografia de Baile llanero',
				'num_asistentes' => 30,
				'id_cliente' => 5

        	]);
        	$id=15;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 18,
        		'id_espacio' => 6,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#D8BFD8'
        	]);
        		$id+=7;
        	}
        	
        //------- solicitud espacio Cancha Deportiva-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 47,
				'id_espacio' => 7,
				'num_bloques' => 3,
				'dirigido' => 'Adultos y Jovenes',
				'nombre_actividad' => 'Practicas de baloncesto',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-03',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Practicas de baloncesto para Jovenes y Adultos',
				'num_asistentes' => 30,
				'id_cliente' => 1

        	]);
        	$id=47;
        	for ($i=0; $i <3 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 19,
        		'id_espacio' => 7,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#F0E68C'
        	]);
        		$id+=7;
        	}

        //------- solicitud espacio de Cancha Deportiva-----------
        	\DB::table('solicitudes')->insert([
        		'id_bloque' => 14,
				'id_espacio' => 7,
				'num_bloques' => 4,
				'dirigido' => 'Jovenes',
				'nombre_actividad' => 'Practicas de Futbol',
				'responsable' => 'Rosa',
				'permanente' => 'Si',
				'fecha' => '2019-07-04',
				'status' => 'Aprobado',
				'descripcion_actividad' => 'Practicas de Futbol a niños y a Jovenes',
				'num_asistentes' => 30,
				'id_cliente' => 1

        	]);
        	$id=14;
        	for ($i=0; $i <4 ; $i++) { 
        		\DB::table('agenda')->insert([
        		'id_solicitud' => 20,
        		'id_espacio' => 7,
        		'id_bloque' => $id,
        		'permanente' => 'Si',
                'color' => '#90EE90'
        	]);
        		$id+=7;
        	}

    }
}
