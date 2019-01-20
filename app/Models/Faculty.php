<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $hidden=['created_at','deleted_at'];//for hide this fields in the return objects
    //
    public function fields()
    {
        return $this->hasMany('App\Models\Field');
    }

    public function students()
    {
        return $this->hasManyThrough('App\Models\Student','App\Models\Field');
    }
}
