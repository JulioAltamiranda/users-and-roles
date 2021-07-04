<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Establecer la relacion con usuarios
    public function users()
    {
        return $this->belongsToMany('App\User','user_role');
    }
}
