<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_NoUser extends Model
{
    use HasFactory;

    public function calendario(){
        return $this->belongsTo(Calendar::class);
    }
}
