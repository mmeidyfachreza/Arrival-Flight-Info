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
    public function scopeSearch($query,$date,$from = 0,$to = 0)
    {
        return $query->where(function($query) use ($date,$from,$to){
            $query->whereDate('arrival','=',$date)
                        ->orWhere('from','=',$from)
                        ->orWhere('to','=',$to);
        });
    }
}
