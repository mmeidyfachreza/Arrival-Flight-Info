<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Http\Resources\Destination as DestRes;

class DestinationController extends Controller
{
    public function Index()
    {
        return DestRes::collection(Destination::all());
    }
}
