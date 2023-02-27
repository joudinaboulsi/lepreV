<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Le Pre</title>

    <!--== Favicon ==-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Font-awesome Icons CSS ==-->
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!--== Icofont Min Icons CSS ==-->
    <link href="{{ asset('/css/icofont.min.css') }}" rel="stylesheet" />
    <!--== lastudioIcons CSS ==-->
    <link href="{{ asset('/css/lastudioIcons.css') }}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" />
    <!--== Aos CSS ==-->
    <link href="{{ asset('/css/aos.css') }}" rel="stylesheet" />
    <!--== FancyBox CSS ==-->
    <link href="{{ asset('/css/jquery.fancybox.min.css') }}" rel="stylesheet" />
    <!--== Slicknav CSS ==-->
    <link href="{{ asset('/css/slicknav.css') }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset('/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Slick CSS ==-->
    <link href="{{ asset('/css/slick.css') }}" rel="stylesheet" />
    <!--== Main Style CSS ==-->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
    <!--== Main Style CSS ==-->
    <link href="{{ asset('/css/custom-style.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('/css/customize.css') }}" rel="stylesheet" /> --}}

</head>

<body>

    <!--wrapper start-->
    <div class="wrapper home-two-wrapper">

        @if (Session::has('msg'))
            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="commentLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close no-border float-end" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="row p-4">
                                <p class="text-3 mb-0">{{ session('msg') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @include('layouts.header')

        <main class="main-content">
            @yield('content')
        </main>

        @include('layouts.footer')

        <!--== Scroll Top Button ==-->
        <div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>

        <!--== Start Product Quick View ==-->
        <aside class="product-quick-view-modal">
            <div class="product-quick-view-inner">
                <div class="product-quick-view-content">
                    <button type="button" class="btn-close">
                        <span class="close-icon"><i class="lastudioicon-e-remove"></i></span>
                    </button>
                    <div class="row row-gutter-0">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="thumb">
                                <img src="{{ asset('/img/shop/quick-view1.jpg') }}" alt="Moren-Shop">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-product-info">
                                <h4 class="title">Product Simple</h4>
                                <div class="product-rating">
                                    <div class="review">
                                        <p><span></span>99 in stock</p>
                                    </div>
                                </div>
                                <div class="prices">
                                    <span class="price">£49.90</span>
                                </div>
                                <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Fringilla quis ipsum enim viverra. Enim in morbi tincidunt ante luctus tincidunt
                                    integer. Sed adipiscing vehicula.</p>
                                <div class="quick-product-action">
                                    <div class="action-top">
                                        <div class="pro-qty-area">
                                            <div class="pro-qty">
                                                <input type="text" id="quantity" title="Quantity" value="1">
                                                <a href="#" class="inc qty-btn">+</a><a href="#"
                                                    class="dec qty-btn">-</a>
                                            </div>
                                        </div>
                                        <a class="btn-theme btn-black" href="shop-cart.html">Add to cart</a>
                                    </div>
                                    <div class="action-bottom">
                                        <a class="btn-wishlist" href="shop-wishlist.html"><i
                                                class="labtn-icon labtn-icon-wishlist"></i>Add to wishlist</a>
                                        <a class="btn-compare" href="shop-compare.html"><i
                                                class="labtn-icon labtn-icon-compare"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="product-ratting">
                                    <div class="product-sku">
                                        SKU: <span>REF. LA-276</span>
                                    </div>
                                </div>
                                <div class="product-categorys">
                                    <div class="product-category">
                                        Category: <span>Uncategorized</span>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="title">Tags:</h3>
                                    <div class="widget-tags">
                                        <ul>
                                            <li><a href="shop.html">Blazer,</a></li>
                                            <li><a href="shop.html">Fashion,</a></li>
                                            <li><a href="shop.html">wordpress,</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-social-info">
                                    <a href="#"><span class="lastudioicon-b-facebook"></span></a>
                                    <a href="#"><span class="lastudioicon-b-twitter"></span></a>
                                    <a href="#"><span class="lastudioicon-b-linkedin"></span></a>
                                    <a href="#"><span class="lastudioicon-b-pinterest"></span></a>
                                </div>
                                <div class="product-nextprev">
                                    <a href="shop-single-product.html">
                                        <i class="lastudioicon-arrow-left"></i>
                                    </a>
                                    <a href="shop-single-product.html">
                                        <i class="lastudioicon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-overlay"></div>
        </aside>
        <!--== End Product Quick View ==-->

        <!--== Start Aside Search Menu ==-->
        <div class="search-box-wrapper">
            <div class="search-box-content-inner">
                <div class="search-box-form-wrap">
                    <div class="search-note">
                        <p>Start typing and press Enter to search</p>
                    </div>
                    <form action="#" method="post">
                        <div class="search-form position-relative">
                            <label for="search-input" class="sr-only">Search</label>
                            <input type="search" class="form-control" placeholder="Search" id="search-input">
                            <button class="search-button"><i class="lastudioicon-zoom-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--== End Aside Search Menu ==-->
            <a href="javascript:;" class="search-close"><i class="lastudioicon-e-remove"></i></a>
        </div>
        <!--== End Aside Search Menu ==-->

        <!--== Start Sidebar Cart Menu ==-->
        <aside class="sidebar-cart-modal">
            <div class="sidebar-cart-inner">
                <div class="sidebar-cart-content">
                    <a class="cart-close" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
                    <div class="sidebar-cart">
                        <h4 class="sidebar-cart-title">Shopping Cart</h4>
                        <div class="product-cart">
                            <div class="product-cart-item">
                                <div class="product-img">
                                    <a href="shop.html"><img src="{{ asset('/img/shop/cart/1.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="product-info">
                                    <h4 class="title"><a href="shop.html">I’m a Unicorn Earrings</a></h4>
                                    <span class="info">1 × £69.00</span>
                                </div>
                                <div class="product-delete"><a href="#/">×</a></div>
                            </div>
                            <div class="product-cart-item">
                                <div class="product-img">
                                    <a href="shop.html"><img src="{{ asset('/img/shop/cart/2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="product-info">
                                    <h4 class="title"><a href="shop.html">Knit cropped cardigan</a></h4>
                                    <span class="info">1 × £29.90</span>
                                </div>
                                <div class="product-delete"><a href="#/">×</a></div>
                            </div>
                        </div>
                        <div class="cart-total">
                            <h4>Subtotal: <span class="money">£98.90</span></h4>
                        </div>
                        <div class="shipping-info">
                            <div class="loading-bar">
                                <div class="load-percent"></div>
                                <div class="label-free-shipping">
                                    <div class="free-shipping svg-icon-style">
                                        <span class="svg-icon" id="svg-icon-shipping"
                                            data-svg-icon="{{ asset('/img/icons/shop1.svg') }}"></span>
                                    </div>
                                    <p>Spend £101.10 to get Free Shipping</p>
                                </div>
                            </div>
                        </div>
                        <div class="cart-checkout-btn">
                            <a class="btn-theme" href="shop-cart.html">View cart</a>
                            <a class="btn-theme" href="shop-checkout.html">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="sidebar-cart-overlay"></div>
        <!--== End Sidebar Cart Menu ==-->

        <!--== Start Side Menu ==-->
        <aside class="off-canvas-wrapper canvas-fullpage-menu">
            <div class="off-canvas-inner">
                <div class="off-canvas-overlay"></div>
                <!-- Start Off Canvas Content Wrapper -->
                <div class="off-canvas-content">
                    <!-- Off Canvas Header -->
                    <div class="off-canvas-header">
                        <div class="close-action">
                            <button class="btn-close"><i class="lastudioicon-e-remove"></i></button>
                        </div>
                    </div>

                    <div class="off-canvas-item">
                        <!-- Start Mobile Menu Wrapper -->
                        <div class="res-mobile-menu">
                            <!-- Note Content Auto Generate By Jquery From Main Menu -->
                        </div>
                        <!-- End Mobile Menu Wrapper -->
                    </div>
                    <!-- Off Canvas Footer -->
                    <div class="off-canvas-footer"></div>
                </div>
                <!-- End Off Canvas Content Wrapper -->
            </div>
        </aside>
        <!--== End Side Menu ==-->
    </div>

    <!--=======================Javascript============================-->

    <!--=== Modernizr Min Js ===-->
    <script src="{{ asset('/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('/js/jquery-main.js') }}"></script>
    <script src="{{ asset('/js/jquery-main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ asset('/js/jquery-migrate.js') }}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!--=== jquery Appear Js ===-->
    <script src="{{ asset('/js/jquery.appear.js') }}"></script>
    <!--=== jquery Swiper Min Js ===-->
    <script src="{{ asset('/js/swiper.min.js') }}"></script>
    <!--=== jquery Fancybox Min Js ===-->
    <script src="{{ asset('/js/fancybox.min.js') }}"></script>
    <!--=== jquery Aos Min Js ===-->
    <script src="{{ asset('/js/aos.min.js') }}"></script>
    <!--=== jquery Slicknav Js ===-->
    <script src="{{ asset('/js/jquery.slicknav.js') }}"></script>
    <!--=== jquery Countdown Js ===-->
    <script src="{{ asset('/js/jquery.countdown.min.js') }}"></script>
    <!--=== jquery Tippy Js ===-->
    <script src="{{ asset('/js/tippy.all.min.js') }}"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{ asset('/js/isotope.pkgd.min.js') }}"></script>
    <!--=== jquery Vivus Js ===-->
    <script src="{{ asset('/js/vivus.js') }}"></script>
    <!--=== Parallax Min Js ===-->
    <script src="{{ asset('/js/parallax.min.js') }}"></script>
    <!--=== Slick  Min Js ===-->
    <script src="{{ asset('/js/slick.min.js') }}"></script>
    <!--=== jquery Wow Min Js ===-->
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <!--=== jquery Zoom Min Js ===-->
    <script src="{{ asset('/js/jquery-zoom.min.js') }}"></script>

    <!--=== Custom Js ===-->
    <script src="{{ asset('/js/custom.js') }}"></script>

    <script>
        function openNav() {
            document.getElementById("mySidenav").classList.add('side-nav-width');

        }

        function closeNav() {
            document.getElementById("mySidenav").classList.remove('side-nav-width');
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".icon-dark").hide();
            $('.logo-dark').hide();

            @if (Route::currentRouteName() == 'home_path')

                $("#main .cartH").hide();
                $("#main .logH").hide();
                $("#main .spann").hide();
                $(".searchHeader").show();
                $(".icon-white").show();
                $(".icon-dark").hide();

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 56) {
                        $(".navbar").addClass("bg-white");
                        $("#main").css('color', '#7E8F98');
                        $("#main a").css('color', '#7E8F98');
                        $(".icon-dark").show();
                        $(".icon-white").hide();
                        $('.logo-white').hide();
                        $('.logo-dark').show();

                    } else {
                        $(".navbar").removeClass("bg-white");
                        $("#main").hide
                        $("#main a").hide();
                        $(".icon-white").show();
                        $(".icon-dark").hide();
                        $('.logo-white').show();
                        $('.logo-dark').hide();

                    }
                });
            @endif


            @if (Route::currentRouteName() == 'all_products_path' ||
                    'csr_path' ||
                    'eshop_product_path' ||
                    'contact_path' ||
                    Route::currentRouteName() == 'news_path' ||
                    Route::currentRouteName() == 'story_path')
                $('.logo-white').hide();
                $("#main .spann").hide();
                $("#main .cartH").show();
                $("#main .logH").hide();
                $('.logo-dark').show();
                $(".icon-dark").show();
                $(".icon-white").hide();
            @else
                $('.logo-white').hide();
                $('.logo-dark').hide();
                $(".icon-white").show();
                $(".icon-dark").hide();
            @endif

            @if (Route::currentRouteName() == 'all_products_path' ||
                    'csr_path' ||
                    'contact_path' ||
                    Route::currentRouteName() == 'news_path' ||
                    Route::currentRouteName() == 'story_path')
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 56) {
                        $(".navbar").addClass("bg-white");
                        $("#main").css('color', '#7E8F98');
                        $("#main a").css('color', '#7E8F98');
                    } else {
                        $(".navbar").removeClass("bg-white");
                    }
                });
            @else
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 56) {
                        $(".navbar").addClass("bg-white");
                        $("#main").css('color', '#7E8F98');
                        $("#main").css('color', '#7E8F98');

                        $(".icon-dark").show();
                        $(".icon-white").hide();
                        $('.logo-white').hide();
                        $('.logo-dark').show();
                        $("#main .cartH").hide();
                        $("#main .logH").hide();
                        $("#main .spann").hide();
                        $(".searchHeader").show();
                    } else {
                        $(".navbar").removeClass("bg-white");
                        $("#main").css('color', '#FFF');
                        $("#main a").css('color', '#FFF');
                        $(".icon-white").show();
                        $(".icon-dark").hide();
                        $('.logo-white').show();
                        $('.logo-dark').hide();
                    }
                });
            @endif
            // If Mobile, add background color when toggler is clicked
            $(".navbar-toggler").click(function() {
                if (!$(".navbar-collapse").hasClass("show")) {
                    $(".navbar").addClass("bg-white");
                } else {
                    if ($(window).scrollTop() < 56) {
                        $(".navbar").removeClass("bg-white");
                    } else {}
                }
            });

        });
    </script>

    <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">
        $("#careersform").validate();
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>


    <script type="text/javascript">
        // Update Cart Quantity
        function addToCart(product_id, qty, option1_value = null, option2_value = null, option3_value = null) {
            $("#full_page_loader").show();
            var currency = <?php echo json_encode(app('settings')->currency); ?>;
            $.ajax({
                url: "/add-to-cart",
                method: "POST",
                data: {
                    product_id,
                    'qty': qty,
                    option1_value,
                    option2_value,
                    option3_value
                },
                headers: {
                    'X-CSRF-Token': $('.csrf-token').val()
                },
                dataType: "json",
                success: function(data) {
                    $("#full_page_loader").hide();
                    // If the variant  we are updating has enough stock and is valid
                    if (data["success"] == 1) {
                        $('.notification-' + data.variant_id).empty();
                        var cart = $('#cart');
                        cart.addClass('shake');
                        $('.cart-count').html(data.cart_count);
                        setTimeout(function() {
                            cart.removeClass('shake');
                        }, 500);
                        /*$('.notification-'+data.variant_id).append('<div class=\"alert alert-success\" role=\"alert\">Product has been added to cart!</div>').fadeOut(5000);*/
                    }
                    // If the variant does not have enough stock
                    else {
                        // We do not add the quantity to the cart
                        Swal.fire({
                            title: 'Error!',
                            text: 'Maximum stock reached',
                            icon: 'error',
                            confirmButtonText: 'Back'
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.cart-count').html(data.cart_count);
                    $("#full_page_loader").hide();
                    console.log('Status:' + jqXHR.status);
                    console.log('Text status:' + textStatus);
                    console.log('Error Thrown:' + errorThrown);
                }
            });
        }
        $("#option1, #option2, #option3").children('a').on("click", function(event) {
            event.preventDefault()
            const url = new URL(window.location.href)
            const optionName = $(this).text()
            console.log(optionName)
            $(this).siblings("input").attr("value", optionName)
            $(this).siblings("a").removeClass("active")
            $(this).addClass("active")
            const data = {
                "option1_value": $("#option1_value").val(),
                "option2_value": $("#option2_value").val(),
                "option3_value": $("#option3_value").val(),
                'product_id': $(".cart-form input[name=product_id]").val(),
                'qty': $(".cart-form input[name=qty]").val(),
            };
            const headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };
            $.ajax({
                type: "post",
                url: '/api/GetProductVariant/' + data.product_id,
                data,
                headers,
                beforeSend: function() {
                    $("#full_page_loader").show()
                },
                success: function(response) {
                    console.log(response)
                    $("#full_page_loader").hide()
                    $price_tag = $(".product-price > .new")
                    if (response.success === 0) {
                        $(".product-price > .new-price").hide();
                        $price_tag.text("Product not available.")
                    } else if (response.success === 1) {
                        const variant = response.variant;
                        const price = variant.price;
                        $(".product-price > .new-price").hide();
                        $price_tag.text(price);

                    }
                    // $("#cart .cart-count span").text(response.cart_count) // for jimmy jims
                },
                error: function(error) {
                    console.log(error);
                    $("#full_page_loader").hide();
                    console.log('Status:' + jqXHR.status);
                    console.log('Text status:' + textStatus);
                    console.log('Error Thrown:' + errorThrown);
                    return
                }
            })
        })
        $("#submit_addtocart").click(function() {
            var qty = $(".cart-form input[name=qty]").val();
            var product_id = $(".cart-form input[name=product_id]").val();
            const option1_value = $("#option1_value").val()
            const option2_value = $("#option2_value").val()
            const option3_value = $("#option3_value").val()
            console.log(product_id, option1_value, option2_value, option3_value)
            addToCart(product_id, qty, option1_value, option2_value, option3_value);

        })
        $(document).ready(function() {
            $("img").on("error", function() {
                $(this).attr("src", "{{ asset('images/error/no-image.jpg') }}")
            })
        })
    </script>

</body>

</html>
