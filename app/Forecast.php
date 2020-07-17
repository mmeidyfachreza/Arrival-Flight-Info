<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $fillable = ['airline_id', 'airplane_id', 'city_id'];

    public function airline()
    {
        return $this->belongsTo('App\Airline','airline_id');
    }

    public function airplane()
    {
        return $this->belongsTo('App\Airplane','airplane_id');
    }
}
