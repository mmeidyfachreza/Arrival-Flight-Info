<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = ['name','codename'];

    public function flight_status()
    {
        return $this->hasMany('App\FlightStatus');
    }

    public function forecast()
    {
        return $this->hasMany('App\Forecast');
    }
}
