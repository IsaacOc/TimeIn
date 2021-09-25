<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;



use App\Repositories\PostRepositoryInterface;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fires link event capturing page url       
        $this->repository->saveLinks();
        //returns view home index for time_In recording data
        $timeIn = $this->repository->timeRegister(Auth::user()->email,Date("D,d/M/y"));
        
        if(sizeof($timeIn) > 0){
            if($timeIn[0]['Time_In'] !== null  ){
                return view('partials.404');
            }
        }
        else{
            return view('home');
        }
    
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

            $timeInLogArray = array(              
                            'role' => $request->input('role'),
                            'email' => $request->input('email'),
                            'time_in' => $request->input('tim'), 
                            'date_in' => $request->input('dat'),             
                        );
            
            $Logs = $this->repository->addTimeIn($timeInLogArray);

        // successfully saved
            if($Logs){

        //fires event capturing Time_in notification
        ////////////////////////////////////////////////////////
            $this->repository->sendNotification();

        //return log
                $Logs = $this->repository->getAllLogs();
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
