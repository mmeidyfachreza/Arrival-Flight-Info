<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tujuan = Destination::all();
        return view('admin.destination.index',compact('tujuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('amdin.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Destination::store($request->all());
        return redirect()->route('jadwal.index')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tujuan = Destination::findOrFail($id);
        //return view('admin.destination.index',compact('tujuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tujuan = Destination::findOrFail();
        return view('admin.destination.index',compact('tujuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Destination::update($request->all());
        return redirect()->route('jadwal.index')->with('success','Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tujuan=Destination::findOrFail($id);
        $tujuan->delete();
        return redirect()->route('tujuan.index')->with('success','Berhasil menghapus data');
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('destinations')->select('id', 'name')->where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
}
