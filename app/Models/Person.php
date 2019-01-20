<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table="persons";
public function students()
{
return $this->belongsTo('App\Models\Student');
}
}
