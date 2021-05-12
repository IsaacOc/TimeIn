<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Logs;
use App\Events\Links;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fires link event capturing page url
        event(new Links());

        $Logs = Logs::find($id);
        //returns view edit Log page with payload data
        return view('Logs.edit',['Logs' => $Logs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //updates Log table with time_out value from view where matching id
        $Logs = Logs::where('id',$id)->update([
           
            'time_out' => $request->input('tim'),
        ]);

        if($Logs){
            //fires link event capturing page url
            event(new Links());
            //need to redirect to edit Log page with success session message and payload data
            return redirect()->route('Logs.edit',['Logs' => $id])->with('success' , 'Time Out Recorded LogOut');
        }
        return back()->withInput()-with('error','Error creating try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
