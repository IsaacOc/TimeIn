
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:3em;">
        
        <!-- users -->
            <div class=" table-responsive pull-left" style="padding:0em;margin-top:2em;">
                 <h4> Users </h4>
                    <div class="panel panel-default pull-left">
                    
                        <table class="table-striped">
                        <thead>
                        
                        </thead>
                        <tbody>
                        @foreach($user as $users)
                        <tr>
                        <!--display users -->
                        <td>{{ $users->name }}<br/>{{ $users->email }}</td>
                                        
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
            </div>

                <!--logs-->
                 
                    <div class=" table-responsive" style="padding-left:2em;margin-top:2em;">
                        <h4> Log for </h4>
                        <div  class="panel panel-default"  >
                        
                            <div  class="panel-heading" style="background-color:grey">&nbsp;</div>
                                <div  style="padding:0.5em;" >
                                    <table class=" table-responsive">
                                    <thead>
                                    <tr>
                                    <th style="padding:0.1em">Date</th>
                                    <th style="padding-left:3em" >Time In</th>
                                    <th style="padding-left:3em">Time Out</th>
                                    <!--check if users is admin to add table heading page hit -->
                                    @if(Auth::user()->role == "admin" )
                                    <th style="padding-left:3em">Page Hits</th>
                                    @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($log as $logs)
                                    <tr>
                                    <td style="padding:0.1em" >{{ $logs->Date_In }}</td>
                                    <td style="padding-left:3em" >{{ $logs->Time_In }}</td>
                                    <td style="padding-left:3em" >{{ $logs->Time_Out }}</td>
                                    <!--check if users is admin to add table data and payload page hit url -->
                                    @if($logs->Role == "admin" )
                                    @foreach($pagehit as $pagehits)
                                    @if($logs->Email == $pagehits->name )
                                    <td style="padding-left:1em" >{{ $pagehits->url}}</td>
                                    @endif
                                    @endforeach
                                    @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>


             

             
             

             
        
        
        

</div>
@endsection