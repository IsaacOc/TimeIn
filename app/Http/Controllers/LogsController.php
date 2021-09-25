<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Repositories\PostRepositoryInterface;

class LogsController extends Controller
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
        $this->repository->saveLinks();

        //$Logs = Logs::find($id);
        $Logs = $this->repository->getLogsById($id);

        //returns view edit Log page with payload data
        if($Logs['Time_Out'] == null){

        return view('Logs.edit',['Logs' => $Logs]);
        
        }
        else{
            return view('partials.404');
        }
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
        
        $updatetimOut = array(
            'id' =>   $id,           
            'time_out' => $request->input('tim'),          
        );

        $Logs = $this->repository->updateTimOut($updatetimOut);

        if($Logs){
            //fires link event capturing page url
            $this->repository->saveLinks();
            //need to redirect to edit Log page with success session message and payload data
            return redirect()->route('Logs.edit',['Logs' => $id])->with('success' , 'Time Out Recorded LogOut');
        }
        return back()->withInput()->with('error','Error creating try again');

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
