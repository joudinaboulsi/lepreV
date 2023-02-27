<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="google-site-verification" content="aMkkblELHZ6us-n4mP5b1wwKzt3Yf94vTercIvad1UQ" />

    {!! SEO::generate() !!}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <!-- CSS+SCRIPT OF STRIPE -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <link rel="stylesheet" href="/css/checkout/ladda/ladda-themeless.min.css" />

    <link rel="stylesheet" href="/css/checkout/checkout.css" id="main-styles-link" />

    <!-- intlTelInput CSS -->
    <link href="/css/checkout/plugins/intlTelInput/intlTelInput.css" rel="stylesheet" />

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo app('settings')->fb_pixel; ?>');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display: none;"
            src="https://www.facebook.com/tr?id={{ app('settings')->fb_pixel }}&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ app('settings')->google_analytics }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo app('settings')->google_analytics; ?>');
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!--
    |--------------------------------------------------------------------------
    | MOBILE VERSION
    |--------------------------------------------------------------------------
    -->

            <!-- LOGO ON MOBILE VERSION -->
            <div class="col-lg-5 d-block d-lg-none pt-2">
                <?php $img = app('settings')->logo_lg; ?>
                <a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{ $img }}"
                        alt="{{ app('settings')->store_address->store_name }}" height="200" /></a>
            </div>

            <!-- MOBILE - SHOW ORDER SUMMARY -->
            <div class="col-lg-5 d-block d-lg-none">
                <div class="row p-3">
                    <!-- Order Summary Bloc -->
                    <div class="col-lg-9 bg-light p-3">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOrderSummary">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#orderSummary"
                                        aria-expanded="false" aria-controls="orderSummary">
                                        <h5 class="m-0">Show order summary
                                            <b>{{ $cartSubTotal }} <small>{{ app('settings')->currency }}</small></b>
                                        </h5>
                                    </button>
                                </div>

                                <div id="orderSummary" class="collapse" aria-labelledby="headingOrderSummary"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        @include('checkout.partials.checkout-product-list')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        @include('checkout.partials.promo-code-form')
                        @include('checkout.partials.totals')
                    </div>
                </div>
            </div>

            @yield('content')

            <!--
    |--------------------------------------------------------------------------
    | DESKTOP VERSION
    |--------------------------------------------------------------------------
    -->

            <!-- ORDER SUMMARY (DESKTOP VERSION) -->
            <div class="col-lg-5 d-none d-lg-block bg-light" style="height:100vh">
                <div class="row p-3 px-4">
                    <div class="col-lg-10 p-5">
                        <div style="height: 400px; overflow: auto;">
                            @include('checkout.partials.checkout-product-list')
                        </div>
                        <hr>

                        @include('checkout.partials.promo-code-form')
                        @include('checkout.partials.totals')
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $("#show_order_summary").click(function() {
                $("#checkout_items_mobile").slideToggle();
            });
        </script>

        <!-- AJAX - Load User Address -->
        <script type="text/javascript">
            $("#select_address").change(function() {
                // alert(1);
                $.ajax({
                    url: "/checkout-user-addresses",
                    method: "POST",
                    data: {
                        address_id: $(this).val(),
                    },
                    headers: {
                        "X-CSRF-Token": $("input[name=_token]").val(),
                    },
                    dataType: "json",
                    success: function(address) {
                        // $("input[name='title']").val(address.title);
                        // $("input[name='firstname']").val(address.firstname);
                        // $("input[name='lastname']").val(address.lastname);
                        // $("input[name='address']").val(address.address);
                        // $("input[name='apartment']").val(address.apartment);
                        // $("input[name='city']").val(address.city);
                        // $("input[name='postal_code']").val(address.postal_code);
                        // $("input[name='phone']").val(address.phone);
                        // $(".inputText").val(address.phone);
                        // $("#country_" + address.country_id).prop("selected", "selected");
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Status:" + jqXHR.status);
                        console.log("Text status:" + textStatus);
                        console.log("Error Thrown:" + errorThrown);
                    },
                });
            });
        </script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="/js/checkout/plugins/intlTelInput/intlTelInput.js"></script>

        <script type="text/javascript">
            /*
                			    ----- function that activate the phone flag input and fill the relative hidden input------ 
                			    Input:
                			    - #phone_container: an id attribute that is a parent container div of the phone input
                			    - #phone_name: an id attribute for the input of type tel
                			    --
                			    */
            function phoneCountry(phone_container, phone_name) {
                var phone = $("#" + phone_container); //
                let telInput = phone.find("input[type=tel]");

                var input = document.querySelector("#" + phone_name);
                // initialize
                window.intlTelInput(input, {
                    initialCountry: "lb",
                    preferredCountries: ["lb"],
                    autoPlaceholder: "aggressive",
                    separateDialCode: true,
                });

                // Empty the phone value when I click on a country code
                //  (so we will not copy the wrong country code in the hidden input in case the user changed the country code AFTER filling the phone input)
                $("#" + phone_container + " .iti__country").on("click", function() {
                    phone.find("input[type=tel]").val(""); // empty the phone value
                    phone.find("input[type=hidden]").val(""); // empty the hidden value
                });

                // when writing any value in the phone input
                telInput.on("keyup", function() {
                    var phone_nbr = phone.find("input[type=tel]").val(); // get the phone number
                    var country_code = phone.find(".iti__selected-dial-code").html(); // get the country code

                    if (phone_nbr == "") phone.find("input[type=hidden]").val("");
                    else phone.find("input[type=hidden]").val(country_code +
                        phone_nbr); //concatenate country_code + phone_nbr and set them into the phone_hidden
                });
            }

            phoneCountry("phone_container", "phone");
            phoneCountry("phone_container2", "phone2");

            $(document).ready(function() {
                $("#phone").css("padding-left", "92px");
                $("#phone2").css("padding-left", "92px");
            });
        </script>

        <!-- AREEBA SCRIPT -->
        <script src="https://epayment.areeba.com/checkout/version/51/checkout.js" data-error="errorCallback"
            data-cancel="cancelCallback"></script>

        <script type="text/javascript">
            function errorCallback(error) {
                console.log(JSON.stringify(error));
            }

            function cancelCallback() {
                console.log("Payment cancelled");
            }
        </script>
        <!-- END AREEBA SCRIPT -->

        <!-- CONFIRM PAYMENT -->
        <script type="text/javascript">
            $(".confirm_payment").click(function() {
                // get the checked payment method
                var radio_checked_value = $('input[type=radio][name=payment_method]:checked').val();

                // If CASH ON DELIVERY
                if (radio_checked_value == 1) {
                    var l = Ladda.create(document.querySelector('#form-submit'));
                    l.start();
                    $('#paymentForm').attr('action', '{{ route('checkout_cash_on_delivery') }}').submit();
                }

                // If AREEBA
                else if (radio_checked_value == 2) {
                    var userId = <?php $userId = session()->get('user') !== null ? session()->get('user')->id : session()->get('guest');
                    echo $userId; ?>;
                    var l = Ladda.create(document.querySelector('#form-submit'));
                    l.start();
                    setTimeout(function() {
                        l.stop(); // stop ladda after 6.5 secondes
                    }, 6500);

                    $.ajax({
                        url: "{{ route('areeba_payment') }}",
                        method: "POST",
                        data: {
                            'user_id': userId,
                            'notes': $(".notes").val(),
                            'payment_method': $("input[name='payment_method']").val()
                        },
                        headers: {
                            'X-CSRF-Token': $('input[name=_token]').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            Checkout.configure({
                                order: {
                                    description: data.areeba_format.description,
                                    currency: '{{ app('settings')->checkout->areeba_currency }}',
                                    item: data.areeba_format.items,
                                    taxAmount: data.order.taxAmount,
                                    shippingAndHandlingAmount: data.order.shipping_fees
                                },
                                session: {
                                    id: data.api_response.session.id
                                },
                                interaction: {
                                    merchant: {
                                        name: '{{ app('settings')->checkout->areeba_merchant_name }}',
                                        email: '{{ app('settings')->checkout->areeba_merchant_email }}',
                                        logo: '{{ app('settings')->checkout->areeba_merchant_logo }}',
                                        phone: '{{ app('settings')->checkout->areeba_merchant_phone }}'
                                    },
                                    displayControl: {
                                        billingAddress: 'HIDE',
                                        orderSummary: 'HIDE',
                                        shipping: 'HIDE'
                                    }
                                },
                                customer: {
                                    email: data.order.user_email,
                                    firstName: data.order.shipping_firstname,
                                    phone: data.order.shipping_phone
                                },
                                shipping: {
                                    address: {
                                        city: data.order.shipping_city,
                                        company: data.order.shipping_company,
                                        street: data.order.shipping_address,
                                        postcodeZip: data.order.shipping_postal_code
                                    }
                                },
                                billing: {
                                    address: {
                                        city: data.order.billing_city,
                                        company: data.order.billing_company,
                                        street: data.order.billing_address,
                                        postcodeZip: data.order.billing_postal_code
                                    }
                                },
                                userId: data.order.user_id
                            });

                            Checkout.showLightbox(); // activate areeba payment popup
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('Status:' + jqXHR.status);
                            console.log('Text status:' + textStatus);
                            console.log('Error Thrown:' + errorThrown);
                        }
                    });
                }

                // IF PAYPAL
                else if (radio_checked_value == 3) {
                    var l = Ladda.create(document.querySelector('#form-submit'));
                    l.start();
                    $('#paymentForm').attr('action', '{{ route('payWithpaypal') }}').submit();
                }

                // IF STRIPE
                else if (radio_checked_value == 4)
                    $('#stripe').modal('show');

                // IF 2CHECKOUT
                else if (radio_checked_value == 5)
                    $('#2checkout').modal('show');
            });
        </script>
        <!-- END CONFIRM PAYMENT -->
</body>

</html>
