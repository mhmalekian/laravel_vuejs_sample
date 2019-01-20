<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Student extends Model
{
    //

    protected  $appends=['register_date'];
    public function getRegisterDateAttribute()
    {
        //$dt = new \DateTime();
        //$dt->setTimestamp(date_timestamp_get($this->created_at));
        return Jalalian::forge($this->created_at)->format('%d %B، %Y');
    }
    public function  field()
    {
        return $this->belongsTo('App\Models\Field');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }
}
