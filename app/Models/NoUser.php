<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoUser extends Model
{
    use HasFactory;

    public function actividades(){
        return $this->belongsToMany(Activity::class);
    }

    public function instalaciones(){
        return $this->belongsToMany(Installation::class);
    }
}
