<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightStatus extends Model
{
    protected $fillable = ['airline_id','from','to','arrival','actual','delay'];

    public function airline()
    {
        return $this->belongsTo('App\Airline','airline_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
