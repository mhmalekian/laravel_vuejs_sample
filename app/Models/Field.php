<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    public function faculty()
    {
        return $this->belongsTo('App\Models\Faculty');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
