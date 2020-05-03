<?php

use Illuminate\Database\Seeder;

class PrivilegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//----- registro de modulos----
    	\DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'empleados',
        	'modulo' => 'Empleados'
        ]);//id=1
        \DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'atletas',
        	'modulo' => 'Atletas'
        ]);//id=2
        \DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'inventario',
        	'modulo' => 'Inventario'
        ]);//id=3
        \DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'solicitudes',
        	'modulo' => 'Solicitudes'
        ]);//id=4
        \DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'agenda',
        	'modulo' => 'Agenda'
        ]);//id=5
        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'usuarios',
        	'modulo' => 'Usuarios'
        ]);//id=6
        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'modulos',
            'modulo' => 'Módulos y Privilegios'
        ]);//id=7
        \DB::table('modulos')->insert([
            'menu' => 'Mantenimiento',
            'ruta' => 'productos',
            'modulo' => 'Productos'
        ]);//id=8
        \DB::table('modulos')->insert([
            'menu' => 'Mantenimiento',
            'ruta' => 'cargos',
            'modulo' => 'Cargos'
        ]);//id=9
        \DB::table('modulos')->insert([
            'menu' => 'Mantenimiento',
            'ruta' => 'categorias',
            'modulo' => 'Categorías'
        ]);//id=10
        \DB::table('modulos')->insert([
            'menu' => 'Mantenimiento',
            'ruta' => 'clientes',
            'modulo' => 'Clientes'
        ]);//id=11
        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'visitas',
            'modulo' => 'Visitas'
        ]);//id=12
        \DB::table('modulos')->insert([
            'menu' => 'Vertical',
            'ruta' => 'horarios',
            'modulo' => 'Horarios'
        ]);//id=13
        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'asistencias',
            'modulo' => 'Asistencia de Empleados'
        ]);//id=14
        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'backup',
            'modulo' => 'Respaldos'
        ]);//id=15

        \DB::table('modulos')->insert([
            'menu' => 'Mantenimiento',
            'ruta' => 'bitacora',
            'modulo' => 'Bitácora'
        ]);//id=16

        \DB::table('modulos')->insert([
            'menu' => 'Root',
            'ruta' => 'graficas',
            'modulo' => 'Gráficas'
        ]);//id=17
        

    	//
        \DB::table('privilegios')->insert([

        	'id_modulo' => 1,
        	'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

        	'id_modulo' => 1,
        	'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

        	'id_modulo' => 1,
        	'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

        	'id_modulo' => 1,
        	'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 1,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 1,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 1,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 1,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 2,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 3,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 4,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 5,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 6,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 7,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 8,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 9,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 10,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 11,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 12,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'Ver'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 13,
            'privilegio' => 'pdf'
        ]);
        //
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'Registrar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'Editar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'Actualizar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'empleados'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 14,
            'privilegio' => 'pdf'
        ]);
        //---
        \DB::table('privilegios')->insert([

            'id_modulo' => 15,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 15,
            'privilegio' => 'Crear'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 15,
            'privilegio' => 'Descargar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 15,
            'privilegio' => 'Restaurar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 15,
            'privilegio' => 'Eliminar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 16,
            'privilegio' => 'Listar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 16,
            'privilegio' => 'Vaciar'
        ]);
        \DB::table('privilegios')->insert([

            'id_modulo' => 17,
            'privilegio' => 'Listar'
        ]);

    }
}
