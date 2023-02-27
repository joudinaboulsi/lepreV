@if(session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	<strong>Congratulations!</strong>  {!! session('message') !!}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	<strong>Warning!</strong>  {!! session('error') !!}
    </div>
@endif