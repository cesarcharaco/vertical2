<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PrivilegiosTableSeeder::class);
        $this->call(UsuariosPrivilegiosTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(BloquesTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(EspaciosTableSeeder::class);
        $this->call(AtletasTableSeeder::class);
        $this->call(SolicitudesTableSeeder::class);
        $this->call(DiasNoLabTableSeeder::class);
    }
}
