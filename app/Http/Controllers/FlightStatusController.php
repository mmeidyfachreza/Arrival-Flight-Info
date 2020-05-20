<?php

namespace App\Http\Controllers;

use App\FlightStatus;
use App\Airline;
use App\City;
use Illuminate\Http\Request;

class FlightStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = FlightStatus::with('city')->with('airline')->get();
        return view('admin.flight.index',compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $airlines = Airline::all();
        return view('admin.flight.form',compact('cities','airlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FlightStatus::create($request->all());
        return redirect()->route('status.index')->with('success','Berhasil menghapus data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightStatus  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = FlightStatus::findOrFail($id);
        $cites = City::all();
        $airlines = Airline::all();
        //return view('admin.flight.form',compact('status','cites','airlines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightStatus  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = FlightStatus::findOrFail($id);
        $cities = City::all();
        $airlines = Airline::all();
        return view('admin.flight.form',compact('status','cities','airlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightStatus  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FlightStatus::update($request->all());
        return redirect()->route('status.index')->with('success','Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightStatus  $flightHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status=FlightStatus::find($id);
        $status->delete();
        return redirect()->route('status.index')->with('success','Berhasil menghapus data');
    }

    public function search(Request $request)
    {
        dd($request->all());
    }
}
