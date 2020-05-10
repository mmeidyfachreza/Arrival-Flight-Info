<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name','codename'];

    public function flight_histories()
    {
        return $this->hasMany('App\FlightHistories');
    }
}
