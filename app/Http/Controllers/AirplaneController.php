<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\City;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplane = Airplane::all();
        return view('admin.airplane.index',compact('airplane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.airplane.form',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Airplane::create($request->all());
        return redirect()->route('pesawat.index')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airplane=Airplane::findOrFail($id);
        //return view('admin.airplane.form',compact('airplane'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplane=Airplane::findOrFail($id);
        $cities = City::select('name');
        return view('admin.airplane.form',compact('airplane','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $airplane=Airplane::findOrFail($id);
        $airplane->update($request->all());
        return redirect()->route('pesawat.index')->with('success','Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airplane=Airplane::findOrFail($id);
        $airplane->delete();
        return redirect()->route('pesawat.index')->with('success','Berhasil menghapus data');
    }
}
