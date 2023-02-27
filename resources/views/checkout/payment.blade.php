@extends('checkout.layout.checkout-layout')

@section('content')
<?php 
$language=session('lang');
if($language==""){
$language='ENG';
}
?>
<?php 
$currency_code=session('currency_code');
$currency_id=session('currency_id');
$rate=session('currency_rate');
if($currency_id==""){
$currency_code=app('settings')->currency;
$currency_id=app('settings')->currency_id;
$rate='1';
}
?>
<!-- CHECKOUT FORM -->
<div class="col-lg-7 bg-white">
    <div class="row p-5">
        <div class="col-lg-3"></div>

        <div class="col-lg-8 p-4 pb-0">
            @include('checkout.partials.checkout-header')

            <br>

            @include('checkout.partials.errors')
            <div class="shipping_info_table">
                <div>
                    <table width="100%">
                        <tr class="border-bottom">
                            <td class="shipping_info_table_title">Contact</td>
                            <td class="py-2" style="width:70%;">{{ $checkoutData->user_email }}</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="shipping_info_table_title">Ship to</td>
                            <td class="shipping_info_table_content">
                                {{ $checkoutData->shipping_firstname }} {{ $checkoutData->shipping_lastname }}<br>
                                {{ $checkoutData->shipping_apartment }},
                                {{ $checkoutData->shipping_address }},
                                {{ $checkoutData->shipping_postal_code }},
                                {{ $checkoutData->shipping_city }},
                                {{ $checkoutData->shipping_country }}<br>
                                {{ $checkoutData->shipping_phone }}
                            </td>
                        </tr>
                        <tr>
                            <td class="shipping_info_table_title">Bill to</td>
                            <td class="shipping_info_table_content">
                                {{ $checkoutData->billing_firstname }} {{ $checkoutData->billing_lastname }}<br>
                                {{ $checkoutData->billing_apartment }},
                                {{ $checkoutData->billing_address }},
                                {{ $checkoutData->billing_postal_code }},
                                {{ $checkoutData->billing_city }},
                                {{ $checkoutData->billing_country }}<br>
                                {{ $checkoutData->billing_phone }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <br>

            <form method="POST" action="{{ route('checkout_cash_on_delivery') }}" id="paymentForm">
                @csrf
        		<div>
        			Payment method  <br><br>
                    <div class="border px-2 py-1">
                        <div>
                            <table width="100%">
                                <!-- CASH ON DELIVERY  -->
                                @if(app('settings')->checkout->cash_on_delivery_active == 1)
                                <tr>
                                    <td class="py-2" style="width:80%; font-size:14px;">
                                        <input type="radio" name="payment_method" id="cash_on_delivery" class="mr-1" value="1" checked>
                                        <label for="cash_on_delivery">Cash On Delivery</label>
                                    </td>
                                </tr>
                                @endif

                                <!-- AREEBA  -->
                                @if(app('settings')->checkout->areeba_active == 1)
                                <tr style="border-top: 1px solid #e6e6e6;">
                                    <td class="py-2" style="width:80%; font-size:14px;">
                                        <input type="radio" name="payment_method" id="areeba" class="mr-1" value="2">
                                        <label for="areeba">Areeba</label>
                                    </td>
                                </tr>
                                @endif

                                <!-- PAYPAL  -->
                                @if(app('settings')->checkout->paypal_active == 1)
                                <tr style="border-top: 1px solid #e6e6e6;">
                                    <td class="py-2" style="width:80%; font-size:14px;">
                                        <input type="radio" name="payment_method" class="mr-1" id="paypal_payment" value="3">
                                        <label for="paypal_payment">Paypal</label>
                                    </td>
                                </tr>
                                @endif

                                <!-- STRIPE  -->
                                @if(app('settings')->checkout->stripe_active == 1)
                                <tr style="border-top: 1px solid #e6e6e6;">
                                    <td class="py-2" style="width:80%; font-size:14px;">
                                        <input type="radio" name="payment_method" class="mr-1" id="stripe_payment" value="4">
                                        <label for="stripe_payment">Stripe</label>
                                    </td>
                                </tr>
                                @endif

                                <!-- 2CHECKOUT  -->
                                @if(app('settings')->checkout->two_checkout_active == 1)
                                <tr style="border-top: 1px solid #e6e6e6;">
                                    <td class="py-2" style="width:80%; font-size:14px;">
                                        <input type="radio" name="payment_method" class="mr-1" id="2checkout_payment" value="5">
                                        <label for="2checkout_payment">2Checkout</label>
                                    </td>
                                </tr>
                                @endif

                            </table>
                        </div>
                    </div>
                        
        		</div>
            </form>

    		<br>

    		<!-- Return to Cart or Continue to shipping -->
			<div>
				<br>
				<a href="{{ route('checkout_shipping_path') }}" class="link_colors" style=" font-size:13px;">< Return to shipping</a>
                <button class="continue_to_shipping confirm_payment ladda-button" id="form-submit" data-style="expand-left">Confirm payment</button>  
			</div>
            
    	</div>
	</div>
</div>


<!-- 2CHECKOUT MODAL -->
<div class="modal" id="2checkout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="myCCForm" action="{{ route('two_checkout_path') }}" method="post">
                @csrf
                
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="">
                                <div class="row display-tr" >
                                    <div class="display-td" >                            
                                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                    </div>
                                </div>     
                                <div class="panel-body">
                                    <input id="token" name="token" type="hidden" value="">

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Card Number</label> 
                                            <input id="ccNo" class='form-control' type="text" size="20" value="" autocomplete="off" required />
                                        </div>
                                    </div>
                  
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input id="cvv" class='form-control' placeholder='ex. 311' size='4' type="text" value="" autocomplete="off" required />
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> 
                                            <input type="text" size="2" id="expMonth" class='form-control' placeholder='MM' required />
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label>
                                            <input type="text"  class='form-control' placeholder='YYYY' size='4' id="expYear" required />
                                        </div>
                                    </div>      
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary ladda-button" type="submit" data-style="expand-left">Pay Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- END 2CHECKOUT MODAL -->

<!-- STRIPE MODAL -->
<div class="modal" id="stripe" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ app('settings')->checkout->stripe_publishable_key }}" id="payment-form">
                @csrf
            
                <div class="modal-header">
                    <h5 class="modal-title">Stripe Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                  
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table" >
                                    <div class="row display-tr" >
                                        <div class="display-td" >                            
                                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                        </div>
                                    </div>                    
                                </div>
                                <div class="panel-body">
                  
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif
                  
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> 
                                            <input class='form-control' size='4' type='text'> <br>

                                            <label class='control-label'>Card Number</label> 
                                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div>
                  
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> 
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> 
                                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> 
                                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                        </div>
                                    </div>
              
                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                        </div>
                                    </div>          
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary ladda-button" type="submit" id="stripe-submit" data-style="expand-left">Pay Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- END STRIPE MODAL -->

<script src="/js/checkout/ladda/spin.min.js"></script>
<script src="/js/checkout/ladda/ladda.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#paymentForm").validate();
    $("#myCCForm").validate();
    $("#payment-form").validate();
</script>

<!-- 2CHECKOUT -->
<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

<script>
    // Called when token created successfully.
    var successCallback = function (data) {
        var myForm = document.getElementById("myCCForm");

        // Set the token as the value for the token input
        myForm.token.value = data.response.token.token;

        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
        myForm.submit();
    };

    // Called when token creation fails.
    var errorCallback = function (data) {
        // Retry the token request if ajax call fails
        if (data.errorCode === 200) {
            // This error code indicates that the ajax call failed. We recommend that you retry the token request.
        } else {
            alert(data.errorMsg);
        }
    };

    var tokenRequest = function () {
        // Setup token request arguments
        var args = {
            sellerId: "<?php echo app('settings')->checkout->two_checkout_merchant_code; ?>",
            publishableKey: "<?php echo app('settings')->checkout->two_checkout_publishable_key; ?>",
            ccNo: $("#ccNo").val(),
            cvv: $("#cvv").val(),
            expMonth: $("#expMonth").val(),
            expYear: $("#expYear").val(),
        };

        // Make the token request
        TCO.requestToken(successCallback, errorCallback, args);
    };

    $(function () {
        // Pull in the public encryption key for our environment
        TCO.loadPubKey();

        $("#myCCForm").submit(function (e) {
            // Call our token request function
            tokenRequest();

            // Prevent form from submitting
            return false;
        });
    });
</script>
<!-- END 2CHECKOUT -->

<!-- STRIPE -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {
        var $form = $(".require-validation");

        $("form.require-validation").bind("submit", function (e) {
            var $form = $(".require-validation"),
                inputSelector = ["input[type=email]", "input[type=password]", "input[type=text]", "input[type=file]", "textarea"].join(", "),
                $inputs = $form.find(".required").find(inputSelector),
                $errorMessage = $form.find("div.error"),
                valid = true;
            $errorMessage.addClass("hide");

            $(".has-error").removeClass("has-error");

            $inputs.each(function (i, el) {
                var $input = $(el);

                if ($input.val() === "") {
                    $input.parent().addClass("has-error");
                    $errorMessage.removeClass("hide");
                    e.preventDefault();
                }
            });

            if (!$form.data("cc-on-file")) {
                var l = Ladda.create(document.querySelector("#stripe-submit"));
                l.start();

                e.preventDefault();

                Stripe.setPublishableKey($form.data("stripe-publishable-key"));

                Stripe.createToken(
                    {
                        number: $(".card-number").val(),
                        cvc: $(".card-cvc").val(),
                        exp_month: $(".card-expiry-month").val(),
                        exp_year: $(".card-expiry-year").val(),
                    },
                    stripeResponseHandler
                );
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $(".error").removeClass("hide").find(".alert").text(response.error.message);
            } else {
                $("#form-submit").prop("disabled", true);

                // token contains id, last4, and card type
                var token = response["id"];
                // insert the token into the form so it gets submitted to the server
                $form.find("input[type=text]").empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
<!-- END STRIPE -->

@stop
