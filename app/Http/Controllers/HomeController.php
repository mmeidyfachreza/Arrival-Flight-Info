<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\City;
use App\FlightStatus;
use App\Forecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::all();
        $status = FlightStatus::with('fromCity')->with('toCity')->with('airplane')->get();
        return view('home2',compact('status','cities'));
    }

    public function index2()
    {
        $forecast = Forecast::all();
        return view('index',compact('forecast'));
    }

    public function getAirplane($id)
    {
        $airplane = Airplane::findOrFail($id);
        return view('show_airplane',compact('airplane'));
    }

    public function getForecast()
    {
        $forecast = Forecast::all();
        return view('index',compact('forecast'));
    }

    public function graphForecast($id)
    {
        $forecast = Forecast::findOrFail($id);
        
        if (request()->ajax()) {
            $data_mt = array("minitab" => (new FastExcel)->import(public_path('file/'.$forecast->file),function ($line) {
                return (integer)$line['PREDIKSI'];
            })->toArray());
            
            //python
            // $pyhton = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe '.public_path('file/' . "testing.py").' '.public_path('file/' . $forecast->file2));
            $python = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe '.public_path('file/' . "testing.py").' '.public_path('file/' . $forecast->file2).' '.$forecast->a.' '.$forecast->b.' '.$forecast->c);
            $python = explode("\n",$python);
            $data = [];
            $python1 = [];
            $python2 = [];
            array_pop($python);
            foreach ($python as $key => $value) {
                array_push($data,explode("|",$value));
            }
            foreach ($data as $key => $value) {
                array_push($python1,(integer)round((float)$value[0]));
                array_push($python2,(integer)round((float)$value[1]));
            }
            $python1 = array("python1" => $python1);
            $python2 = array("python2" => $python2);
            //endPython

            return response(array_merge($data_mt,$python1,$python2));
        }
        return view('detail_forecast',compact('forecast'));
    }

    public function graphForecast2($id)
    {
        $forecast = Forecast::findOrFail($id);
        
        if (request()->ajax()) {
            $pyhton = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe '.public_path('file/' . "testing.py").' '.public_path('file/' . $forecast->file2));
            $pyhton = explode("\n",$pyhton);
            $data_py = [];
            foreach ($pyhton as $key => $value) {
                array_push($data_py,(integer)round((float)$value));
            }
            array_pop($data_py);
            $data_py = array("python" => $data_py);
            return response($data_py);
        }
        return view('detail_forecast',compact('forecast'));
    }

    public function indexAdmin ()
    {
        $cities = City::all();
        $status = FlightStatus::with('fromCity')->with('toCity')->with('airline')->get();
        $airlines = Airline::all();
        return view('admin.home',compact('status','cities','airlines'));
    }

    public function search(Request $request)
    {
        if ($request->date) {
            $request->date = date('Y-m-d', strtotime($request->date));
        }

        // dd($request->all());
        $status = FlightStatus::search($request->date,$request->from,$request->to)->with('fromCity')->with('toCity')->with('airline')->get();
        $cities = City::all();
        $search =  $request;
        return view('home2',compact('status','cities','search'));
        //return Redirect::to( route('home') . '#status')->with(['status'=>$status,'cities'=>$$cities]);
    }

    public function tesExcel()
    {
        
        $data = (new FastExcel)->import(public_path('file/tes.xlsx'),function ($line) {
                return $line['Ramalan'];
        })->toArray();
        foreach ($data as $value) {
            echo $value."\n";
        }
    }

    public function tesQuerry()
    {
        // $bulan = FlightStatus::all()->groupBy(function($d) {
        //     return (int)\Carbon\Carbon::parse($d->arrival)->format('m');
        // });
        // $bulan = FlightStatus::with('airline')->get()->groupBy([
        //     'airline.name',
        //     function($d) {
        //             return (int)\Carbon\Carbon::parse($d->arrival)->format('m');
        //         }
        //     ]);
        $bulan = FlightStatus::with('airline')->with('fromCity')->get()->groupBy([
            'fromCity.name',
            function($d) {
                    return (int)\Carbon\Carbon::parse($d->arrival)->format('m');
                }
            ]);
        dd($bulan);
    }

    public function tes4()
    {
        //$tes = shell_exec('C:\Users\4SUS\AppData\Local\Programs\Python\Python38-32\python.exe D:\Website\backend\python\hello\testing.py D:\Website\testing.csv');
        $forecast = Forecast::findOrFail(5);
        $data_mt = array("minitab" => (new FastExcel)->import(public_path('file/'.$forecast->file),function ($line) {
            return (integer)$line['PREDIKSI'];
        })->toArray());
        dd($forecast);
        
    }
}


