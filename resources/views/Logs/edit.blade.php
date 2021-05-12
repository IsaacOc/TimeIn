
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
                    <form class="form-horizontal" method="POST" action="{{ route('Logs.update',[$Logs]) }}">
                                {{ csrf_field() }}
                        <!--update method take put/patch method but html doesn't support in form add input element-->
                        <input type="hidden" name="_method" value="put">

                        <div class="col-md-12" style="padding:0.3em;text-align:center">
                        <figure class="figure">

                           <h1>{{ date('H:i') }} Hrs </h1>
                            <input id="time" type="hidden" class="form-control"  name="tim" value=" {{date('H:i')}} Hrs" required >
                            <input id="name" type="hidden" class="form-control"  name="name" value=" {{ Auth::user()->name }}" required >
                        
                           <h4>{{ date("D")}}, {{date("d/M/y")}}</h4>
                            <input id="date" type="hidden" class="form-control"  name="dat" value=" {{date('D')}}, {{date('d/M/y')}}" required >

                        </figure>

                        <br/>
                        <button type="submit" class="btn" style="background-color:red;color:white" >
                                            Time Out
                        </button>
                        
                        </div>  

                    </form>
                </div>

             </div> 
            </div>
                      
    </div>
</div>
@endsection
