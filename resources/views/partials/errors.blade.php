@if (isset($errors) && count($errors) > 0)
<div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
           <span aria-hidden="true">&times;</span>
    </button>
    
      <strong> {!!session()->get('errors') !!} </strong>
   
</div>
@endif