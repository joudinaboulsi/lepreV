<!-- Validation form notification -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	<strong>Oh Snap!</strong> There are some fields missing.
      	<ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif