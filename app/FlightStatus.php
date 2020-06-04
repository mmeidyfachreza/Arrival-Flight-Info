<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FlightStatus extends Model
{
    protected $fillable = ['airline_id','from','to','arrival','actual','delay'];

    public function airline()
    {
        return $this->belongsTo('App\Airline','airline_id');
    }

    public function fromCity()
    {
        return $this->belongsTo('App\City','from');
    }

    public function toCity()
    {
        return $this->belongsTo('App\City','to');
    }

    // public function getArrivalAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d\TH:i');
    // }
    public function scopeSearch($query,$date,$from,$to)
    {

        if ($date) {
            $query->whereDate('arrival','=',$date);
        }
        if ($from) {
            $query->where('from','=',$from);
        }
        if ($to) {
            $query->where('to','=',$to);
        }

        return $query;
    }
}
