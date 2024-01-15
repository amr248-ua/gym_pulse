<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendars')->delete();
        //Insertamos usuarios en la tabla
        $calendario1 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario1->activity_id=$actividad->id;
        $calendario1->fecha="2024-02-01";
        $calendario1->hora="10:00:00";
        $calendario1->save();

        $calendario2 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario2->activity_id=$actividad->id;
        $calendario2->fecha="2024-02-02";
        $calendario2->hora="11:00:00";
        $calendario2->save();

        $calendario3 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario3->activity_id=$actividad->id;
        $calendario3->fecha="2024-02-02";
        $calendario3->hora="12:00:00";
        $calendario3->save();

        $calendario4 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario4->activity_id=$actividad->id;
        $calendario4->fecha="2024-02-02";
        $calendario4->hora="13:00:00";
        $calendario4->save();

        $calendario5 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario5->activity_id=$actividad->id;
        $calendario5->fecha="2024-02-02";
        $calendario5->hora="14:00:00";
        $calendario5->save();

        $calendario6 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario6->activity_id=$actividad->id;
        $calendario6->fecha="2024-02-02";
        $calendario6->hora="15:00:00";
        $calendario6->save();

        $calendario7 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario7->activity_id=$actividad->id;
        $calendario7->fecha="2024-02-02";
        $calendario7->hora="16:00:00";
        $calendario7->save();

        $calendario8 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Pilates')->first();
        $calendario8->activity_id=$actividad->id;
        $calendario8->fecha="2024-02-02";
        $calendario8->hora="17:00:00";
        $calendario8->save();

        $calendario9 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario9->activity_id=$actividad->id;
        $calendario9->fecha="2024-02-02";
        $calendario9->hora="10:00:00";
        $calendario9->save();

        $calendario10 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario10->activity_id=$actividad->id;
        $calendario10->fecha="2024-02-02";
        $calendario10->hora="11:00:00";
        $calendario10->save();

        $calendario11 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario11->activity_id=$actividad->id;
        $calendario11->fecha="2024-02-02";
        $calendario11->hora="12:00:00";
        $calendario11->save();

        $calendario12 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario12->activity_id=$actividad->id;
        $calendario12->fecha="2024-02-02";
        $calendario12->hora="13:00:00";
        $calendario12->save();

        $calendario13 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario13->activity_id=$actividad->id;
        $calendario13->fecha="2024-02-02";
        $calendario13->hora="14:00:00";
        $calendario13->save();

        $calendario14 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario14->activity_id=$actividad->id;
        $calendario14->fecha="2024-02-02";
        $calendario14->hora="15:00:00";
        $calendario14->save();

        $calendario15 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Yoga')->first();
        $calendario15->activity_id=$actividad->id;
        $calendario15->fecha="2024-02-02";
        $calendario15->hora="16:00:00";
        $calendario15->save();

        $calendario16 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario16->activity_id=$actividad->id;
        $calendario16->fecha="2024-02-02";
        $calendario16->hora="10:00:00";
        $calendario16->save();

        $calendario17 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario17->activity_id=$actividad->id;
        $calendario17->fecha="2024-02-02";
        $calendario17->hora="11:00:00";
        $calendario17->save();

        $calendario18 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario18->activity_id=$actividad->id;
        $calendario18->fecha="2024-02-02";
        $calendario18->hora="12:00:00";
        $calendario18->save();

        $calendario19 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario19->activity_id=$actividad->id;
        $calendario19->fecha="2024-02-02";
        $calendario19->hora="13:00:00";
        $calendario19->save();

        $calendario20 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario20->activity_id=$actividad->id;
        $calendario20->fecha="2024-02-02";
        $calendario20->hora="14:00:00";
        $calendario20->save();

        $calendario21 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario21->activity_id=$actividad->id;
        $calendario21->fecha="2024-02-02";
        $calendario21->hora="15:00:00";
        $calendario21->save();

        $calendario22 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Zumba')->first();
        $calendario22->activity_id=$actividad->id;
        $calendario22->fecha="2024-02-02";
        $calendario22->hora="16:00:00";
        $calendario22->save();

        $calendario23 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario23->activity_id=$actividad->id;
        $calendario23->fecha="2024-02-02";
        $calendario23->hora="10:00:00";
        $calendario23->save();

        $calendario24 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario24->activity_id=$actividad->id;
        $calendario24->fecha="2024-02-02";
        $calendario24->hora="11:00:00";
        $calendario24->save();

        $calendario25 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario25->activity_id=$actividad->id;
        $calendario25->fecha="2024-02-02";
        $calendario25->hora="12:00:00";
        $calendario25->save();

        $calendario26 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario26->activity_id=$actividad->id;
        $calendario26->fecha="2024-02-02";
        $calendario26->hora="13:00:00";
        $calendario26->save();

        $calendario27 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario27->activity_id=$actividad->id;
        $calendario27->fecha="2024-02-02";
        $calendario27->hora="14:00:00";
        $calendario27->save();

        $calendario28 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario28->activity_id=$actividad->id;
        $calendario28->fecha="2024-02-02";
        $calendario28->hora="15:00:00";
        $calendario28->save();

        $calendario29 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Spinning')->first();
        $calendario29->activity_id=$actividad->id;
        $calendario29->fecha="2024-02-02";
        $calendario29->hora="16:00:00";
        $calendario29->save();

        $calendario30 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario30->activity_id=$actividad->id;
        $calendario30->fecha="2024-02-02";
        $calendario30->hora="10:00:00";
        $calendario30->save();

        $calendario31 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario31->activity_id=$actividad->id;
        $calendario31->fecha="2024-02-02";
        $calendario31->hora="11:00:00";
        $calendario31->save();

        $calendario32 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario32->activity_id=$actividad->id;
        $calendario32->fecha="2024-02-02";
        $calendario32->hora="12:00:00";
        $calendario32->save();

        $calendario33 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario33->activity_id=$actividad->id;
        $calendario33->fecha="2024-02-02";
        $calendario33->hora="13:00:00";
        $calendario33->save();

        $calendario34 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario34->activity_id=$actividad->id;
        $calendario34->fecha="2024-02-02";
        $calendario34->hora="14:00:00";
        $calendario34->save();

        $calendario35 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario35->activity_id=$actividad->id;
        $calendario35->fecha="2024-02-02";
        $calendario35->hora="15:00:00";
        $calendario35->save();

        $calendario36 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Crossfit')->first();
        $calendario36->activity_id=$actividad->id;
        $calendario36->fecha="2024-02-02";
        $calendario36->hora="16:00:00";
        $calendario36->save();

        $calendario37 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario37->activity_id=$actividad->id;
        $calendario37->fecha="2024-02-02";
        $calendario37->hora="10:00:00";
        $calendario37->save();

        $calendario38 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario38->activity_id=$actividad->id;
        $calendario38->fecha="2024-02-02";
        $calendario38->hora="11:00:00";
        $calendario38->save();

        $calendario39 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario39->activity_id=$actividad->id;
        $calendario39->fecha="2024-02-02";
        $calendario39->hora="12:00:00";
        $calendario39->save();

        $calendario40 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario40->activity_id=$actividad->id;
        $calendario40->fecha="2024-02-02";
        $calendario40->hora="13:00:00";
        $calendario40->save();

        $calendario41 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario41->activity_id=$actividad->id;
        $calendario41->fecha="2024-02-02";
        $calendario41->hora="14:00:00";
        $calendario41->save();

        $calendario42 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario42->activity_id=$actividad->id;
        $calendario42->fecha="2024-02-02";
        $calendario42->hora="15:00:00";
        $calendario42->save();

        $calendario43 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Escalada en Roca')->first();
        $calendario43->activity_id=$actividad->id;
        $calendario43->fecha="2024-02-02";
        $calendario43->hora="16:00:00";
        $calendario43->save();

        $calendario44 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario44->activity_id=$actividad->id;
        $calendario44->fecha="2024-02-02";
        $calendario44->hora="10:00:00";
        $calendario44->save();

        $calendario45 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario45->activity_id=$actividad->id;
        $calendario45->fecha="2024-02-02";
        $calendario45->hora="11:00:00";
        $calendario45->save();

        $calendario46 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario46->activity_id=$actividad->id;
        $calendario46->fecha="2024-02-02";
        $calendario46->hora="12:00:00";
        $calendario46->save();

        $calendario47 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario47->activity_id=$actividad->id;
        $calendario47->fecha="2024-02-02";
        $calendario47->hora="13:00:00";
        $calendario47->save();

        $calendario48 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario48->activity_id=$actividad->id;
        $calendario48->fecha="2024-02-02";
        $calendario48->hora="14:00:00";
        $calendario48->save();

        $calendario49 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario49->activity_id=$actividad->id;
        $calendario49->fecha="2024-02-02";
        $calendario49->hora="15:00:00";
        $calendario49->save();

        $calendario50 = new Calendar();
        $actividad = DB::table('activities')->where('nombre', 'Running Club')->first();
        $calendario50->activity_id=$actividad->id;
        $calendario50->fecha="2024-02-02";
        $calendario50->hora="16:00:00";
        $calendario50->save();
        



    }
}
