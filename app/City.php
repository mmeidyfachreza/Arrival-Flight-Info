<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','codename'];

    public function flight_status()
    {
        return $this->hasMany('App\FlightStatus');
    }
}
