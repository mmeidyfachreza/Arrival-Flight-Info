<?php

namespace App\Http\Controllers;

use App\FlightStatus;
use App\Airline;
use App\Airplane;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Rap2hpoutre\FastExcel\FastExcel;

class FlightStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = FlightStatus::with('fromCity')->with('toCity')->with('airline')->get();
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

        $arrival = date('Y-m-d H:i:s', strtotime($request->arrival));
        $actual = date('Y-m-d H:i:s', strtotime($request->actual));
        $arrival = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$arrival);
        $actual = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$actual);
        
        $status = FlightStatus::create($request->all());
        $status->arrival = $request->arrival;
        $status->delay = $arrival->diffInMinutes($actual);
        
        if ($request->hasFile('file') && $request->has('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();            
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $status->file = $filename;
        }
        $status->save();

        return redirect()->route('status.index')->with('success','Berhasil menambah data');
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
        $status = FlightStatus::findOrFail($id);
        if ($request->hasFile('file')) {
            # code...   
            $pathToFile = public_path('file/' . $status->file);
            File::delete($pathToFile);
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $status->file =  $filename;
        }
        $status->update($request->all());
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
        $pathToFile = public_path('file/' . $status->file);
        File::delete($pathToFile);
        $status->delete();
        return redirect()->route('status.index')->with('success','Berhasil menghapus data');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file') && $request->has('file')) {
            $file = $request->file('file');
            $data = (new FastExcel)->import($file,function ($line) {
                $airplane = Airplane::where('code','=',$line['Maskapai'])->first();
                $from = City::where('name','=','Bandung')->first();
                $to = City::where('name','=',$line['Tujuan'])->first();
                $arrival = date('Y-m-d H:i:s', strtotime($line['Arrival']->format('Y-m-d H:i:s')));
                $actual = date('Y-m-d H:i:s', strtotime($line['Aktual']->format('Y-m-d H:i:s')));
                $arrival = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$arrival);
                $actual = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$actual);
                $a = FlightStatus::create([
                    'airplane_id' => $airplane->id,
                    'from' => $from->id,
                    'to' => $to->id,
                    'arrival' => $line['Arrival']->format('Y-m-d H:i:s'),
                    'actual' => $line['Aktual']->format('Y-m-d H:i:s'),
                    'delay' => $arrival->diffInMinutes($actual),
                ]);
                
            });
            return redirect()->route('status.index')->with('success','Berhasil menambah data');
        }else
        echo "gagal";
    }

    public function indexImport()
    {
        return view('admin.flight.import');
    }

    public function search(Request $request)
    {
        dd($request->all());
    }
}
