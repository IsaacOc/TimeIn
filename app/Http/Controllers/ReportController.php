<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Repositories\PostRepositoryInterface;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    private $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fires link event capturing page url
        $this->repository->saveLinks();
        //returns all user from User table
        $user = $this->repository->getAllUser();
        
        //checks if authenticated user role is a 'admin'
        if(Auth::check() && Auth::user()->role == 'admin'){

        //returns all log from Logs table 
        $log = $this->repository->getAllLogs();
        //returns all pagehits from pagehits table
        $pagehit = $this->repository->getAllPagehits();

        //dump payload on report index view
        return view('report.index',['user' => $user,'log' => $log,'pagehit' => $pagehit]);
        }

        //checks if authenticated user role is a 'user'
        if(Auth::check() && Auth::user()->role == 'user'){
            
            $User = array(               
                'email' => Auth::user()->email,
                "role" => Auth::user()->role        
            );
            //selects User table with value from view where matching attribute and returns collection
            $user = $this->repository->getAuthUserByEmailAndRole($User);
           
            //selects Log table with value from view where matching attribute and returns collection
            $log = $this->repository->getAuthUserLogByEmailAndRole($User);
            //dump payload on report index view
            return view('report.index',['user' => $user,'log' => $log,]);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fires link event capturing page url
        $this->repository->saveLinks();
         //checks if authenticated user role is a 'user'
         if(Auth::check() && Auth::user()->role == 'admin'){
            //selects User table with value from view where matching attribute and returns collection
            $user = $this->repository->getUserById($id);
            //updates Log table with value from view where matching attribute and returns collection
            $log = $this->repository->getLogsById($id);
            //dump payload on report index view
            return view('report.edit',['user' => $user,'log' => $log,]);
            }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
