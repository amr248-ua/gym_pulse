<?php

namespace App\Enums;

enum TipoHorario: string {
  
    use BaseEnum;

    case HORA1 = '9:00-10:00';
    case HORA2 = '10:00-11:00';
    case HORA3 = '11:00-12:00';
    case HORA4 = '13:00-14:00';
    case HORA5 = '14:00-15:00';
    case HORA6 = '15:00-16:00';
    case HORA7 = '16:00-17:00';
    case HORA8 = '17:00-18:00';
    case HORA9 = '18:00-19:00';
    case HORA10 = '19:00-20:00';
    case HORA11 = '20:00-21:00';
    case HORA12 = '21:00-22:00';
}