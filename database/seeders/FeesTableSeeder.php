<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Borramos los datos de la tabla
         DB::table('fees')->delete();
         //Insertamos usuarios en la tabla
         $fee1 = new Fee();
         $fee1->tipo_tarifa="Socio";
         $fee1->tarifa="0.30";
         $fee1->save();

        $fee2 = new Fee();
        $fee2->tipo_tarifa="No Socio";
        $fee2->tarifa="0.00";
        $fee2->save();
 
    }
}
