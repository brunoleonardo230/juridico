@if(Session::has('msg'))
<div class="row">
   <div class="col-lg-12">
      <div class="alert alert-{{ session()->get('class') }} alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <p align="center">
            <strong>{{ session()->get('msg') }}</strong>
         </p>
      </div>
   </div>
</div>
@endif
