@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:1em;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="" >
                <div class="panel-heading" ><h4><b>Add User</b></h4></div>

                <div class="panel-body " style="box-shadow:0px 0px 3px 3px grey">
                    <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}
                        <input id="Admin" type="hidden"  name="Admin" value=" {{ Auth::user()->email }}" >


                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="Name" class="control-label">Name</label>
                                <input id="Name" type="text" class="form-control" name="Name" placeholder="Full Name" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="Email" class="control-label">Email</label>
                                <input id="Email" type="Email" class="form-control" name="Email" placeholder="Email" required>

                              
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="Password" class="control-label">Password</label>
                                <input id="Password" type="Password" class="form-control" placeholder="Password" name="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="radio" data-toggle="buttons-radio">
                                    <label>
                                        <input type="radio" id="roles" name="roles" value="admin" required> Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="roles" name="roles" value="user" required> User
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-brand btn-success" >
                                    Save
                                </button>                               

                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
