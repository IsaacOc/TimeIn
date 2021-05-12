@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:5em">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div >
                
                <div class="panel-body" style="text-align:center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('home.store') }}">
                                {{ csrf_field() }}

                        <div class="col-md-12" style="padding:0.3em;text-align:center">
                        <figure class="figure">

                           <h1>{{ date('H:i') }} Hrs </h1>
                            <input id="time" type="hidden" class="form-control"  name="tim" value=" {{date('H:i')}} Hrs" required >
                            <input id="role" type="hidden" class="form-control"  name="role" value=" {{ Auth::user()->role }}" required >
                            <input id="email" type="hidden" class="form-control"  name="email" value=" {{ Auth::user()->email }}" required >

                           <h4>{{ date("D")}}, {{date("d/M/y")}}</h4>
                            <input id="date" type="hidden" class="form-control"  name="dat" value=" {{date('D')}}, {{date('d/M/y')}}" required >

                        </figure>

                        <br/>
                        <button type="submit" class="btn" style="background-color:green;color:white" >
                                            Time In
                        </button>
                        
                        </div>  

                    </form>
                </div>

             </div> 
            </div>
                      
    </div>
</div>
@endsection
