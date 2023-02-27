<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="/css/checkout/checkout.css" id="main-styles-link" />

    {!! SEOMeta::generate() !!}
    {{--        {{ dd(app("settings")) }} --}}

    <!-- Facebook Pixel Code -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php
    $currency_code = session('currency_code');
    $currency_id = session('currency_id');
    $rate = session('currency_rate');
    if ($currency_id == '') {
        $currency_code = app('settings')->currency;
        $currency_id = app('settings')->currency_id;
        $rate = '1';
    }
    ?>
    <?php
    $language = session('lang');
    if ($language == '') {
        $language = 'ENG';
    }
    ?>
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
</head>

<body>
    @csrf

    <div class="container-fluid">

        <!--
   |--------------------------------------------------------------------------
   | MOBILE VERSION
   |--------------------------------------------------------------------------
   -->
        <div class="d-block d-lg-none">
            @include('checkout.partials.shopping-cart-header')

            <!-- List of products  -->
            <div class="cart_product_list bg-white mb-5">
                @include('checkout.partials.shopping-cart-product-list')
            </div>

            <!-- Show Order Summary -->
            <div class="row d-block d-lg-none shopping_cart_order_summary">
                <!-- Total Price -->
                <div style="font-size: 18px;">
                    <b>Total: </b>
                    <b class="float-right">{{ $cartSubTotal }} <small>{{ app('settings')->currency }} (incl.
                            VAT)</small></b>
                </div>

                <!-- Action buttons -->
                <div class="row p-0 m-0">
                    <!-- Proceed to checkout -->
                    <div class="col-7 p-1">
                        <a href="{{ route('checkout_info_path') }}">
                            <button class="shopping_cart_mobile_button checkout_active_btn">Proceed to checkout</button>
                        </a>
                    </div>

                    <!-- Back to store -->
                    <div class="col-5 p-1">
                        <a href="{{ route('eshop_path') }}">
                            <button class="shopping_cart_mobile_button checkout_passive_btn">Back to store</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE VERSION -->

        <!--
   |--------------------------------------------------------------------------
   | DESKTOP VERSION
   |--------------------------------------------------------------------------
   -->
        <div class="d-none d-lg-block">
            <div class="row">
                <!-- List of products in the shopping cart -->
                <div class="col-lg-7 bg-white">
                    <div class="row p-3">
                        <div class="col-lg-3"></div>

                        <div class="col-lg-8 p-4 pb-0">
                            @include('checkout.partials.shopping-cart-header')

                            <!-- List of products  -->
                            <div class="cart_product_list">
                                @include('checkout.partials.shopping-cart-product-list')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary  -->
                <div class="col-lg-5 d-none d-lg-block bg-light" style="height:100vh">
                    <div class="row p-3">
                        <div class="col-lg-10 p-5">
                            <!-- Subtotals  -->
                            @include('checkout.partials.totals')

                            <hr />

                            <!-- Additional info  -->
                            <div>
                                <label>Additional info</label><br />
                                <span
                                    class="checkout_additional_info">{{ app('settings')->checkout->additional_info }}</span><br />
                                <span class="checkout_additional_info">* Facing a problem with your shopping experience?
                                    For more information, please <a href="{{ route('contact_path') }}">contact us</a>.
                                </span>
                            </div>

                            <!-- Action buttons  -->
                            <div>
                                <a href="{{ route('eshop_path') }}">
                                    <button class="shopping_cart_desktop_button checkout_passive_btn mb-2">Continue
                                        shopping</button>
                                </a>
                                <div class="text-center">- OR -</div>
                                <a href="{{ route('checkout_info_path') }}">
                                    <button class="shopping_cart_desktop_button checkout_active_btn mt-2">Proceed to
                                        checkout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DESKTOP VERSION -->

    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Loading jQuert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Script for Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        // Update Cart Quantity
        function updateCartQty(variant_id, qty) {
            $.ajax({
                url: "/edit-cart-qty",
                method: "POST",
                data: {
                    variant_id: variant_id,
                    qty: qty,
                },
                headers: {
                    "X-CSRF-Token": $("input[name=_token]").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log("updating variand id=", variant_id, "with quantity =", qty)
                    // If the variant  we are updating has enough stock and is valid
                    if (data["success"] == 1) {
                        console.log(data)
                        // We update the stock and reload page
                        location.reload();
                    }
                    // If the variant does not have enough stock
                    else {
                        // We do not add the quantity to the cart
                        console.log(data)
                        $el = $('.shopping_cart_item_qty[data-variant="' + variant_id + '"]');
                        $el.val($el.val() - 1)
                        Swal.fire({
                            title: "Error!",
                            text: "Maximum stock reached",
                            icon: "error",
                            confirmButtonText: "Back",
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.input-qty').val($(".input-qty").val() - 1)
                    console.log("Status:" + jqXHR.status);
                    console.log("Text status:" + textStatus);
                    console.log("Error Thrown:" + errorThrown);
                    location.reload()
                },
            });
        }

        // When changing the quanity of items in the cart we control the stock
        $(".shopping_cart_item_qty").change(function() {
            if ($(this).val() < 0) {
                Swal.fire({
                    title: "Error!",
                    text: "Maximum stock reached",
                    icon: "error",
                    confirmButtonText: "Back",
                });
            }
            updateCartQty($(this).data("variant"), $(this).val());
        });
    </script>


</body>

</html>
