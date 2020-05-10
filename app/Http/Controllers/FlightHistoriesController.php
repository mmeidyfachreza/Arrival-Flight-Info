<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Destination;
use App\FlightHistories;
use Illuminate\Http\Request;

class FlightHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        $history = FlightHistories::where('activity','=','arrival')->get();
        return view('home2',compact('history','destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        $airlines = Airline::all();
        return view('admin.flight.form',compact('destinations','airlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FlightHistories::create($request->all());
        return redirect()->route('jadwal.create')->with('success','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function show(FlightHistories $flightHistories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightHistories $flightHistories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightHistories $flightHistories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightHistories $flightHistories)
    {
        //
    }
}
