@if (session()->has('errors'))
<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
           <span aria-hidden="true">&times;</span>
    </button>
    
      <strong> {!!session()->get('errors') !!} </strong>
   
</div>
@endif