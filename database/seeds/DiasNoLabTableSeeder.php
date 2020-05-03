<?php

use Illuminate\Database\Seeder;

class DiasNoLabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-06-24',
        		'motivo' => 'Batalla de carabobo'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-07-05',
        		'motivo' => 'Acta de la independencia'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-07-24',
        		'motivo' => 'Natalicio de Simón Bolivar'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-08-03',
        		'motivo' => 'Dia de la Bandera'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-08-04',
        		'motivo' => 'Dia de la Guardia Nacional'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-10-12',
        		'motivo' => 'Dia de la Resistencia Indigena'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-10-24',
        		'motivo' => 'Natalicio de Rafael Urdaneta'

        	]);

        	\DB::table('dias_nolab')->insert([
        		'fecha' => '2019-11-17',
        		'motivo' => 'Dia del Estudiante'

        	]);



    }
}
