<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FlightHistories extends Model
{
    protected $fillable = ['airline_id','destination_id','activity','date1','time1','date2','time2','flight_type'];

    public function airline()
    {
        return $this->belongsTo('App\Airline','airline_id');
    }

    public function destination()
    {
        return $this->belongsTo('App\Destination','destination_id');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] =  Carbon::parse($value);
    }
}
