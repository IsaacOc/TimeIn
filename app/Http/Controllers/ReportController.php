<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Report;
use App\User;
use App\logs;
use App\pagehit;
use App\Events\Links;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fires link event capturing page url
        event(new Links());
        //returns all user from User table
        $user = User::all();
        //loop through the collection
        foreach($user as $users){
            $role = $users->role;
            $id = $users->id;
        }
        //checks if authenticated user role is a 'admin'
        if(Auth::check() && Auth::user()->role == 'admin'){
        //returns all log from Logs table 
        $log = logs::all();
        //returns all pagehits from pagehits table
        $pagehit = pagehit::all();

        //dump payload on report index view
        return view('report.index',['user' => $user,'log' => $log,'pagehit' => $pagehit]);
        }

        //checks if authenticated user role is a 'user'
        if(Auth::check() && Auth::user()->role == 'user'){
            //selects User table with value from view where matching attribute and returns collection
            $user = User::select("*")
            ->where([
                ["role", Auth::user()->role],
                ["email", Auth::user()->email]
            ])
            ->get();
            //updates Log table with value from view where matching attribute and returns collection
            $log = logs::select("*")
            ->where([
                ["role", Auth::user()->role],
                ["email", Auth::user()->email]
            ])
            ->get();
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
    public function edit(Report $report)
    {
        //
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
