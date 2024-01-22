<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('users')->delete();
        //Insertamos usuarios en la tabla
        $admin = new User();
        $admin->usuario="Administrador";
        $admin->webmaster=true;
        $admin->nombre="Administrador";
        $admin->apellidos="";
        $admin->codigo_postal=00000;
        $admin->direccion="Calle del gimnasio";
        $admin->fecha_nacimiento="2024-01-01";
        $admin->telefono=000000000;
        $admin->dni="00000000A";
        $admin->email="admin@gmail.com";
        $admin->password=Hash::make("admin");
        $admin->save();
    }
}
