<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Forecast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forecast = Forecast::all();
        return view('admin.forecast.index',compact('forecast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::select('id','name')->get();
        $airplanes = Airplane::select('id','code','destination')->get();
        return view('admin.forecast.form',compact('airlines','airplanes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forecast = new Forecast();
        $forecast->airline_id = $request->airline_id;
        $forecast->airplane_id = $request->airplane_id;
        $forecast->date = $request->date."-01";
        if ($request->hasFile('file') && $request->has('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();            
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $forecast->file = $filename;
        }

        if ($request->hasFile('file2') && $request->has('file2')) {
            $file = $request->file('file2');
            $filename = time() . '.' . $file->getClientOriginalExtension();            
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $forecast->file2 = $filename;
        }
        
        $forecast->save();
        return redirect()->route('prediksi.index')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forecast  $forecast
     * @return \Illuminate\Http\Response
     */
    public function show(Forecast $forecast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forecast  $forecast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forecast = Forecast::findOrFail($id);
        $airlines = Airline::select('id','name')->get();
        $airplanes = Airplane::select('id','code','destination')->get();
        return view('admin.forecast.form',compact('airlines','airplanes','forecast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forecast  $forecast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $forecast = Forecast::findOrFail($id);
        $forecast->airline_id = $request->airline_id;
        $forecast->airplane_id = $request->airplane_id;
        $forecast->date = $request->date."-01";
        if ($request->hasFile('file')) {
            # code...   
            $pathToFile = public_path('file/' . $forecast->file);
            File::delete($pathToFile);
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $forecast->file =  $filename;
        }
        if ($request->hasFile('file2')) {
            # code...   
            $pathToFile = public_path('file/' . $forecast->file);
            File::delete($pathToFile);
            $file = $request->file('file2');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/',$filename,['disk'=>'my_files']);
            $forecast->file2 =  $filename;
        }
        
        $forecast->update();
        return redirect()->route('prediksi.index')->with('success','Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forecast  $forecast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forecast= Forecast::find($id);
        $pathToFile = public_path('file/' . $forecast->file);
        File::delete($pathToFile);
        $forecast->delete();
        return redirect()->route('prediksi.index')->with('success','Berhasil menghapus data');
    }

    public function tes3()
    {
        //$tes = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe D:\Website\backend\python\hello\testing.py D:\Website\testing.csv');
     
        $tes = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe '.public_path('file/' . "testing.py").' '.public_path('file/' . "testing.csv"));
        $tes = explode("\n",$tes);
        $data = [];
        foreach ($tes as $key => $value) {
            array_push($data,(integer)round((float)$value));
        }
        array_pop($data);
        $data = array("python" => $data);
        dd($data);
        //dd(explode("\n",$tes));
    }
}
