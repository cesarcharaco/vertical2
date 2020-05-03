<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('clientes')->insert([
        	'nombres' => 'Manuel Martinez',
        	'apellidos' => 'Martinez Perez',
        	'nacionalidad' => 'V',
            'cedula' =>'21368926',
            'telefono' => '04121484508',
            'correo' => 'manuel@gmail.com',
            'colabora' => 'Si'

         ]);

        \DB::table('clientes')->insert([
        	'nombres' => 'Alecia Antonia',
        	'apellidos' => 'Cabeza Rondon',
        	'nacionalidad' => 'V',
            'cedula' =>'2418927',
            'telefono' => '042166760523',
            'correo' => 'alecia@gmail.com',
            'colabora' => 'Si'

         ]);
         
        \DB::table('clientes')->insert([
        	'nombres' => 'Maria Antonia',
        	'apellidos' => 'Torres',
        	'nacionalidad' => 'V',
            'cedula' =>'2418927',
            'telefono' => '042166760523',
            'correo' => 'maria@gmail.com',
            'colabora' => 'Si'

         ]);

        \DB::table('clientes')->insert([
        	'nombres' => 'Rafael guillermo',
        	'apellidos' => 'Ibañez Perez',
        	'nacionalidad' => 'V',
            'cedula' =>'21368779',
            'telefono' => '042167505236',
            'correo' => 'rafael@gmail.com',
            'colabora' => 'Si'

         ]);        

        \DB::table('clientes')->insert([
        	'nombres' => 'Rosa Estela',
        	'apellidos' => 'Martinez Rondon',
        	'nacionalidad' => 'V',
            'cedula' =>'8586231',
            'telefono' => '042166760523',
            'correo' => 'rosa@gmail.com',
            'colabora' => 'No'

         ]);

        \DB::table('clientes')->insert([
        	'nombres' => 'Daniela Karina',
        	'apellidos' => 'Zarmiento matinez',
        	'nacionalidad' => 'V',
            'cedula' =>'19269208',
            'telefono' => '04177274714',
            'correo' => 'daniela@gmail.com',
            'colabora' => 'No'

         ]);

        \DB::table('clientes')->insert([
        	'nombres' => 'Rosnely Alexmer',
        	'apellidos' => 'Leal Martine',
        	'nacionalidad' => 'V',
            'cedula' =>'24923148',
            'telefono' => '04145904296',
            'correo' => 'rosnely@gmail.com',
            'colabora' => 'No'

         ]);

        \DB::table('clientes')->insert([
        	'nombres' => 'Luis Alejandro',
        	'apellidos' => 'Montilla TOvar',
        	'nacionalidad' => 'V',
            'cedula' =>'11999400',
            'telefono' => '04126833804',
            'correo' => 'jcesarchg9@gmail.com',
            'colabora' => 'No'

         ]);



    }
}
