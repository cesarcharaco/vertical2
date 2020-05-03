<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Manuel',
            'email' => 'admin@vertical.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'tipo_usuario' => 'Admin',
            'pregunta' => 'Nombre',
            'respuesta' => 'Vertical'
        ]);

        App\User::create([
            'name' => 'Kelvin',
            'email' => 'kelvin@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'tipo_usuario' => 'Telecomunicaciones',
            'pregunta' => 'Nombre',
            'respuesta' => 'Vertical'
        ]);

        App\User::create([
            'name' => 'Andy',
            'email' => 'andy@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'tipo_usuario' => 'Administración',
            'pregunta' => 'Nombre',
            'respuesta' => 'Vertical'
        ]);

        App\User::create([
            'name' => 'Engracia',
            'email' => 'engracia@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'tipo_usuario' => 'Cultura',
            'pregunta' => 'Nombre',
            'respuesta' => 'Vertical'
        ]);
        

    }
}
