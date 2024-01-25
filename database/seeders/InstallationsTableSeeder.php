<?php

namespace Database\Seeders;

use App\Models\Installation;
use App\Enums\TipoHorario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('installations')->delete();
        //Insertamos usuarios en la tabla
        $instalacion1 = new Installation();
        $instalacion1->nombre="Pista de tenis 1";
        $instalacion1->imagen="img/instalaciones/instalacion1.jpg";
        $instalacion1->plazas=4;
        $instalacion1->precio=14.99;
        $instalacion1->maxTiempo=120;
        $instalacion1->horario=TipoHorario::DIAENTERO;
        $instalacion1->save();

        $instalacion2 = new Installation();
        $instalacion2->nombre="Pista de tenis 2";
        $instalacion2->imagen="img/instalaciones/instalacion1.jpg";
        $instalacion2->plazas=4;
        $instalacion2->precio=14.99;
        $instalacion2->maxTiempo=120;
        $instalacion2->horario=TipoHorario::DIAENTERO;
        $instalacion2->save();

        $instalacion3 = new Installation();
        $instalacion3->nombre="Pista de tenis 3";
        $instalacion3->imagen="img/instalaciones/instalacion1.jpg";
        $instalacion3->plazas=4;
        $instalacion3->precio=14.99;
        $instalacion3->maxTiempo=120;
        $instalacion3->horario=TipoHorario::DIAENTERO;
        $instalacion3->save();

        $instalacion4 = new Installation();
        $instalacion4->nombre="Pista de tenis 4";
        $instalacion4->imagen="img/instalaciones/instalacion1.jpg";
        $instalacion4->plazas=4;
        $instalacion4->precio=14.99;
        $instalacion4->maxTiempo=120;
        $instalacion4->horario=TipoHorario::DIAENTERO;
        $instalacion4->save();

        $instalacion5 = new Installation();
        $instalacion5->nombre="Pista de tenis 5";
        $instalacion5->imagen="img/instalaciones/instalacion1.jpg";
        $instalacion5->plazas=4;
        $instalacion5->precio=14.99;
        $instalacion5->maxTiempo=120;
        $instalacion5->horario=TipoHorario::DIAENTERO;
        $instalacion5->save();

        $instalacion6 = new Installation();
        $instalacion6->nombre="Pista de padel 1";
        $instalacion6->imagen="img/instalaciones/instalacion2.jpg";
        $instalacion6->plazas=4;
        $instalacion6->precio=14.99;
        $instalacion6->maxTiempo=120;
        $instalacion6->horario=TipoHorario::DIAENTERO;
        $instalacion6->save();

        $instalacion7 = new Installation();
        $instalacion7->nombre="Pista de padel 2";
        $instalacion7->imagen="img/instalaciones/instalacion2.jpg";
        $instalacion7->plazas=4;
        $instalacion7->precio=14.99;
        $instalacion7->maxTiempo=120;
        $instalacion7->horario=TipoHorario::DIAENTERO;
        $instalacion7->save();

        $instalacion8 = new Installation();
        $instalacion8->nombre="Pista de padel 3";
        $instalacion8->imagen="img/instalaciones/instalacion2.jpg";
        $instalacion8->plazas=4;
        $instalacion8->precio=14.99;
        $instalacion8->maxTiempo=120;
        $instalacion8->horario=TipoHorario::DIAENTERO;
        $instalacion8->save();
        
        $instalacion9 = new Installation();
        $instalacion9->nombre="Pista de padel 4";
        $instalacion9->imagen="img/instalaciones/instalacion2.jpg";
        $instalacion9->plazas=4;
        $instalacion9->precio=14.99;
        $instalacion9->maxTiempo=120;
        $instalacion9->horario=TipoHorario::DIAENTERO;
        $instalacion9->save();

        $instalacion10 = new Installation();
        $instalacion10->nombre="Pista de padel 5";
        $instalacion10->imagen="img/instalaciones/instalacion2.jpg";
        $instalacion10->plazas=4;
        $instalacion10->precio=14.99;
        $instalacion10->maxTiempo=120;
        $instalacion10->horario=TipoHorario::DIAENTERO;
        $instalacion10->save();

        $instalacion11 = new Installation();
        $instalacion11->nombre="Piscina interior";
        $instalacion11->imagen="img/instalaciones/instalacion3.jpg";
        $instalacion11->plazas=40;
        $instalacion11->precio=9.99;
        $instalacion11->maxTiempo=60;
        $instalacion11->horario=TipoHorario::DIAENTERO;
        $instalacion11->save();

        $instalacion12 = new Installation();
        $instalacion12->nombre="Rocodromo";
        $instalacion12->imagen="img/instalaciones/instalacion4.jpg";
        $instalacion12->plazas=20;
        $instalacion12->precio=9.99;
        $instalacion12->maxTiempo=60;
        $instalacion12->horario=TipoHorario::DIAENTERO;
        $instalacion12->save();



    }
}
