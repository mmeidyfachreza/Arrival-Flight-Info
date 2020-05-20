<?php

namespace App\Http\Controllers;

use App\Airline;
use App\City;
use App\FlightStatus;
use Illuminate\Http\Request;
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
        $status = FlightStatus::with('fromCity')->with('toCity')->with('airline')->get();
        return view('home2',compact('status','cities'));
    }

    public function indexAdmin()
    {
        $cities = City::all();
        $status = FlightStatus::with('fromCity')->with('toCity')->with('airline')->get();
        $airlines = Airline::all();
        return view('admin.home',compact('status','cities','airlines'));
    }

    public function search(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->date));
        // dd($date);
        $status = FlightStatus::search($date,$request->from,$request->to)->with('fromCity')->with('toCity')->with('airline')->get();
        $cities = City::all();
        return view('home2',compact('status','cities'));
        //return Redirect::to( route('home') . '#status')->with(['status'=>$status,'cities'=>$$cities]);
    }
}
