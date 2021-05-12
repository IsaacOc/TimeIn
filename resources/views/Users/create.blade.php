<div id="myModal" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

             <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                     <h3 class="modal-title">Add User</h3>               
             </div>

<form id="user_form" class="form-horizontal" method="post" action="{{ route('user.store') }}" >
                       
                     {{ csrf_field() }}

                <div class="modal-body">                    
                     <span id="form_output"></span>

                        <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">
                             
                                <label for="Name" class="control-label">Name</label>
                                <input id="Name" type="text" class="form-control" name="Name" placeholder="Full Name" required>

                                @if ($errors->has('Name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Name') }}</strong>
                                    </span>
                                @endif
                             
                        </div>

                        <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                             
                                <label for="Email" class="control-label">Email</label>
                                <input id="Email" type="Email" class="form-control" name="Email" placeholder="Email" required>

                                @if ($errors->has('Email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            
                               <label for="Password" class="control-label">Password</label>
                                <input id="Password" type="Password" class="form-control"  name="Password" placeholder="Password" required>
                             
                        </div>

                        <div class="form-group">
                            
                                <div class="radio" data-toggle="buttons-radio">
                                    <label>
                                        <input type="radio" id="admin" name="roles" value="admin" required> Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="user" name="roles" value="user" required> User
                                    </label>
                                </div>
                            
                        </div>                  
                    
                   
                </div>

                <div class="modal-footer">
                  
                        <div class="form-group">
                             
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>                                    
                             
                                <button type="submit" class="btn btn-brand btn-success"> + Add User </button>
                                
                        </div>

                </div>

</form>

        </div>
    </div>
</div>
