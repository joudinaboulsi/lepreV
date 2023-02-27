@extends('user.layouts.layout')

@section('content')

<div class="signup_background"> 
    <div class="row">
        <div class="col-lg-12">
            @include('user.partials.flash')
        </div>
    </div>
    
    <div class="row">
        <?php $img = app('settings')->authentication->lg_forgot_password_img; ?>
        <div class="col-lg-6 p-0 bg-white" style="background-image:url(<?php echo $img ?>); background-size:cover; background-position:center;"></div>

        <div class="col-lg-6 p-0 bg-white">

            @include('user.partials.logo')

            <!-- Form -->
            <div class="p-4">
                <div class="col-lg-12 text-center">
                    @include('user.partials.errors')

                    <div class="signup_description">
                        <span class="signup_title">{{ app('settings')->authentication->forgot_password_title }}</span><br>
                        {{ app('settings')->authentication->forgot_password_text }}
                    </div><br>

                    <!-- Sign in Form -->
                    <form method="POST" action="{{ route('reset_password_path') }}">
                        @csrf
                        <input type="email" name="email" placeholder="Email" class="form-control form-group users_inputs" required>
                        <button type="submit" class="action_button ladda-button" data-style="expand-left" id="form-submit"><span class="ladda-label">Reset Password</span></button><br><br>
                    </form>

                    <hr>

                    <!-- Back to e-commerce -->
                    <button class="secondary_button">
                        <a href="{{ route('shop_path') }}" class="text-white">Continue shopping</a>
                    </button><br><br>

                    <a href="{{ route('sign_in_path') }}">Already have an account? Sign in</a><br>
                    <a href="{{ route('sign_up_path') }}">Create account</a><br><br>

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