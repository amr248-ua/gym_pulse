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
        $actividad1->descripcion="Descubre la armonía entre cuerpo y mente mientras fortaleces tu núcleo y mejora tu postura con nuestras sesiones de pilates.";
        $actividad1->imagen="img/actividades/actividad1.jpg";
        $actividad1->plazas=20;
        $actividad1->precio=19.99;
        $actividad1->duracion=60;
        $actividad1->save();

        $actividad2 = new Activity();
        $actividad2->nombre="Yoga";
        $actividad2->descripcion="Encuentra paz, equilibrio y fortaleza y conecta mente, cuerpo y espíritu con nuestras sesiones de yoga.";
        $actividad2->imagen="img/actividades/actividad2.jpg";
        $actividad2->plazas=20;
        $actividad2->precio=19.99;
        $actividad2->duracion=60;
        $actividad2->save();

        $actividad3 = new Activity();
        $actividad3->nombre="Zumba";
        $actividad3->descripcion="Siente la música, libera el estrés y diviértete mientras quemas calorías con nuestras sesiones de Zumba.";
        $actividad3->imagen="img/actividades/actividad3.jpg";
        $actividad3->plazas=20;
        $actividad3->precio=19.99;
        $actividad3->duracion=60;
        $actividad3->save();

        $actividad4 = new Activity();
        $actividad4->nombre="Spinning";
        $actividad4->descripcion="Pedalea hacia una versión más fuerte y saludable de ti mismo con nuestras sesiones de spinning.";
        $actividad4->imagen="img/actividades/actividad4.jpg";
        $actividad4->plazas=20;
        $actividad4->precio=19.99;
        $actividad4->duracion=60;
        $actividad4->save();

        $actividad5 = new Activity();
        $actividad5->nombre="Crossfit";
        $actividad5->descripcion="Descubre tu potencial con CrossFit! Desafía tus límites, esculpe tu cuerpo y potencia tu resistencia.";
        $actividad5->imagen="img/actividades/actividad5.jpg";
        $actividad5->plazas=20;
        $actividad5->precio=19.99;
        $actividad5->duracion=60;
        $actividad5->save();

        $actividad6 = new Activity();
        $actividad6->nombre = "Escalada en Roca";
        $actividad6->descripcion = "Eleva tu aventura con la escalada en roca! Descubre la emoción de desafiar alturas, superar obstáculos y conquistar cimas.";
        $actividad6->imagen = "img/actividades/actividad6.jpg";
        $actividad6->plazas = 12;
        $actividad6->precio = 24.99;
        $actividad6->duracion = 120;
        $actividad6->save();

        $actividad7 = new Activity();
        $actividad7->nombre = "Running Club";
        $actividad7->descripcion = "Únete a nuestro Running Club, alcanza nuevas metas y corre hacia un estilo de vida activo y lleno de energía.";
        $actividad7->imagen = "img/actividades/actividad7.jpg";
        $actividad7->plazas = 25;
        $actividad7->precio = 10.99;
        $actividad7->duracion = 45;
        $actividad7->save();
    }
}
