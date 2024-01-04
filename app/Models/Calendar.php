<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    public function actividades(){
        return $this->belongsTo(Activity::class);
    }

    public function reservaActividad(){
        return $this->hasOne(Activity_User::class);
    }

    public function reservaInstalacion(){
        return $this->hasOne(Installation_User::class);
    }

    public function actividadesNoUser(){
        return $this->hasOne(Activity_NoUser::class);
    }

    public function instalacionesNoUser(){
        return $this->hasOne(Installation_NoUser::class);
    }
}
