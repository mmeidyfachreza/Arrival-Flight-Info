<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['code', 'destination'];

    public function forecast()
    {
        return $this->hasMany('App\Forecast');
    }
}
