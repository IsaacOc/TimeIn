<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

use App\Logs;
use App\Events\Links;
use App\Events\TimeIn;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fires link event capturing page url       
        event(new Links());
        //returns view home index for time_In recording data
        return view('home');
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.create');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saves user time_in when time button clicked
        //checkes if authenticate and role attribute not empty string
        if(Auth::check() && $request->input('role') != ""){
            $Logs = Logs::create([
               
                'role' => $request->input('role'),
                'email' => $request->input('email'),
                'time_in' => $request->input('tim'), 
                'date_in' => $request->input('dat'),             
            ]);
        // successfully saves
            if($Logs){
                //fires link event capturing Time_in
                event(new TimeIn());
        //return log
                $Logs = Logs::all();
        // iterate through collection       
                foreach($Logs as $Log){
                    $name = $Log->Role;
                    $id = $Log->id;
                }
        //checks if role value from posting form is equal to retrieve set of values from base table Log
                if( $request->input('role') == $name){
                //need to redirect to edit Log page with success session message and payload data waiting for timeout update
                return redirect()->route('Logs.edit',['logid' => $id])
                ->with('success' , 'Time In recorded thanx');

                }
            }
        } 
   
    }
}
