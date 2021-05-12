@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:1em">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="">
                <div class="panel-heading" ><h4><b>Edit User</b></h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update',[$user->id]) }}">
                        {{ csrf_field() }}
<!--update method take put/patch method but html doesn't support in form add input element-->
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                            <label for="Name" class="control-label">Name</label>
                                <input id="Name" type="text" class="form-control" name="Name" value="{{ $user->name }}" required>

                                @if ($errors->has('Name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                            <label for="Email" class="control-label">Email</label>
                                <input id="Email" type="Email" class="form-control" name="Email" value="{{ $user->email }}" required>

                                @if ($errors->has('Email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-8">
                            <label for="Password" class="control-label">Password</label>
                                <input id="Password" type="Password" class="form-control" value="{{ $user->password }}" name="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="radio"data-toggle="buttons-radio">
                                    <label>
                                        <input type="radio" name="role" value="admin" required> Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="role" value="user" required> User
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
