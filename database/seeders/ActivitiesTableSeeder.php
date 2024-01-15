<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('activities')->delete();
        //Insertamos usuarios en la tabla
        $actividad1 = new Activity();
        $actividad1->nombre="Pilates";
        $actividad1->descripcion="Actividad de pilates para todos los niveles";
        $actividad1->imagen="/public/img/actividades/actividad1.jpg";
        $actividad1->plazas=20;
        $actividad1->precio=19.99;
        $actividad1->duracion=60;
        $actividad1->save();

        $actividad2 = new Activity();
        $actividad2->nombre="Yoga";
        $actividad2->descripcion="Actividad de yoga para todos los niveles";
        $actividad2->imagen="/public/img/actividades/actividad2.jpg";
        $actividad2->plazas=20;
        $actividad2->precio=19.99;
        $actividad2->duracion=60;
        $actividad2->save();

        $actividad3 = new Activity();
        $actividad3->nombre="Zumba";
        $actividad3->descripcion="Actividad de zumba para todos los niveles";
        $actividad3->imagen="/public/img/actividades/actividad3.jpg";
        $actividad3->plazas=20;
        $actividad3->precio=19.99;
        $actividad3->duracion=60;
        $actividad3->save();

        $actividad4 = new Activity();
        $actividad4->nombre="Spinning";
        $actividad4->descripcion="Actividad de spinning para todos los niveles";
        $actividad4->imagen="/public/img/actividades/actividad4.jpg";
        $actividad4->plazas=20;
        $actividad4->precio=19.99;
        $actividad4->duracion=60;
        $actividad4->save();

        $actividad5 = new Activity();
        $actividad5->nombre="Crossfit";
        $actividad5->descripcion="Actividad de crossfit para todos los niveles";
        $actividad5->imagen="/public/img/actividades/actividad5.jpg";
        $actividad5->plazas=20;
        $actividad5->precio=19.99;
        $actividad5->duracion=60;
        $actividad5->save();

        $actividad6 = new Activity();
        $actividad6->nombre = "Escalada en Roca";
        $actividad6->descripcion = "Aventuras emocionantes escalando rocas al aire libre";
        $actividad6->imagen = "/public/img/actividades/actividad7.jpg";
        $actividad6->plazas = 12;
        $actividad6->precio = 24.99;
        $actividad6->duracion = 120;
        $actividad6->save();

        $actividad7 = new Activity();
        $actividad7->nombre = "Running Club";
        $actividad7->descripcion = "Unete a nuestro club de running y mejora tu resistencia";
        $actividad7->imagen = "/public/img/actividades/actividad3.jpg";
        $actividad7->plazas = 25;
        $actividad7->precio = 10.99;
        $actividad7->duracion = 45;
        $actividad7->save();
    }
}
