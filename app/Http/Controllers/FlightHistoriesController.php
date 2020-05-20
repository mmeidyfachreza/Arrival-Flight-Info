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
        $history = FlightHistories::with('destination')->with('airline')->get();
        return view('admin.flight.index',compact('history'));
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
        return redirect()->route('jadwal.index')->with('success','Berhasil menghapus data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = FlightHistories::findOrFail($id);
        $destinations = Destination::all();
        $airlines = Airline::all();
        //return view('admin.flight.form',compact('jadwal','destinations','airlines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = FlightHistories::findOrFail($id);
        $destinations = Destination::all();
        $airlines = Airline::all();
        return view('admin.flight.form',compact('jadwal','destinations','airlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FlightHistories::update($request->all());
        return redirect()->route('jadwal.index')->with('success','Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightHistories  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal=FlightHistories::find($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success','Berhasil menghapus data');
    }

    public function search(Request $request)
    {
        dd($request->all());
    }
}
