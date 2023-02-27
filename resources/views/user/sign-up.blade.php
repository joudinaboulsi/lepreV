@extends('user.layouts.layout')

@section('content')

<div class="signup_background"> 
    <div class="row">
        <div class="col-lg-12">
            @include('user.partials.flash')
        </div>
    </div>

    <div class="row">
        <?php $img = app('settings')->authentication->lg_signup_img; ?>
        <div class="col-lg-6 p-0 bg-white" style="background-image:url(<?php echo $img ?>); background-size:cover; background-position:center;"></div>

        <div class="col-lg-6 p-0 bg-white">

            @include('user.partials.logo')

            <!-- Form -->
            <div class="p-4">
                <div class="col-lg-12 text-center">
                    @include('user.partials.errors')

                    <div class="signup_description">
                        <span class="signup_title">{{ app('settings')->authentication->signup_title }}</span><br>
                        {{ app('settings')->authentication->signup_text }}
                    </div><br>

                    <!-- Sign up Form -->
                    <form method="POST" action="{{ route('register_path') }}">
                        @csrf
                        <input type="text" name="firstname" placeholder="Firstname" minlength="2" maxlength="25" class="form-control form-group users_inputs"required>
                        <input type="text" name="lastname" placeholder="Lastname" minlength="2" maxlength="25" class="form-control form-group users_inputs" required>
                        <input type="email" name="email" placeholder="Email" class="form-control form-group users_inputs" required>
                        <input type="password" name="password" placeholder="Password" minlength="6" maxlength="20" class="form-control form-group users_inputs" required>
                        <div class="float-left">
                            <input type="checkbox" name="has_newletters" class="mr-2" id="has_newletters" checked><label for="has_newletters"><small>Subscribe to newsletters</small></label>
                        </div><br><br>

                        <button type="submit" class="btn action_button ladda-button" data-style="expand-left" id="form-submit"><span class="ladda-label">Create Account</span></button><br><br>
                    </form>

                    <hr>

                    <!-- Back to e-commerce -->
                    <button class="secondary_button">
                        <a href="{{ route('shop_path') }}" class="text-white">Continue shopping</a>
                    </button><br><br>

                    <a href="{{ route('sign_in_path') }}">Already have an account? Sign in</a><br>

                </div>
            </div><br>

        </div>
    </div>
</div>

<script src="/js/checkout/ladda/spin.min.js"></script>
<script src="/js/checkout/ladda/ladda.min.js"></script>
<script type="text/javascript">
    $('#form-submit').on('click',function(){
        var form = $(this).closest('form')[0];
        if(form.checkValidity() == true) {
            var l = Ladda.create( document.querySelector( '#form-submit' ) );
            l.start();
            form.submit();
        }
    });
</script>

@stop




