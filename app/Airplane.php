<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['code', 'destination'];

    public function flight_status()
    {
        return $this->hasMany('App\FlightStatus');
    }

    public function forecast()
    {
        return $this->hasMany('App\Forecast');
    }
}
