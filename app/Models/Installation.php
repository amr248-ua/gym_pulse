<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'bloqueado'];

    public function usuarios(){
        return $this->belongsToMany(User::class);
    }

    public function no_users(){
        return $this->belongsToMany(NoUser::class);
    }
}
