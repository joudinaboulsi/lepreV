@extends('layouts.app')
@section('content')
    <?php
    $language = session('lang');
    if ($language == '') {
        $language = 'ENG';
    }
    ?>

    <style>
        input[type=radio]+label {
            color: black;
        }

        input[type=radio]:checked+label {
            color: #91A13B
        }
    </style>
    <div class="container-fluid pl-0 pr-0">
        <div class="row">
            <div class="col-md"
                style="background-image: url({{ url('assets/juices.jpg') }});
                     height:400px; background-repeat: no-repeat;background-size: cover;">

            </div>
            <div class="col-md"
                style="background-image: url({{ url('assets/vinegars.jpg') }});  height:400px; background-repeat: no-repeat;background-size: cover;">
            </div>
        </div>
        {{-- start section juices --}}
        <div class="container-fluid" style="background-color: #eee">
            {{-- button customize --}}
            <div class="custom-btn" style="">
                <a href="{{ route('customize.step-one') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="131"
                        height="131" viewBox="0 0 131 131" style="position: sticky!important">
                        <defs>
                            <clipPath id="clip-path">
                                <rect id="Rectangle_1327" data-name="Rectangle 1327" width="52.24" height="46.462"
                                    fill="none" stroke="#fff" stroke-width="1.41" />
                            </clipPath>
                        </defs>
                        <circle id="Ellipse_2525" data-name="Ellipse 2525" cx="65.5" cy="65.5" r="65.5"
                            fill="#91a13b" />
                        <text id="CUSTOMIZE_YOUR_PACK" data-name="CUSTOMIZE YOUR PACK" transform="translate(62.832 87.678)"
                            fill="#fff" font-size="14" font-family="Helvetica-Bold, Helvetica" font-weight="700"
                            letter-spacing="-0.01em" opacity="0.89">
                            <tspan x="-40.538" y="0">CUSTOMIZE</tspan>
                            <tspan x="-40.927" y="14">YOUR PACK</tspan>
                        </text>
                        <g id="Group_12338" data-name="Group 12338" transform="translate(34.367 21.426)">
                            <g id="Group_12336" data-name="Group 12336" transform="translate(0 2.099)">
                                <g id="Group_12268" data-name="Group 12268" transform="translate(0 0)"
                                    clip-path="url(#clip-path)">
                                    <path id="Path_293" data-name="Path 293"
                                        d="M22.216,32.051H43.845a2.588,2.588,0,0,0,2.607-1.821h0L49.716,9.7a2.567,2.567,0,0,0-2.343-3.384H14.023l-1.374-4A2.586,2.586,0,0,0,10.048.5H3.1A2.459,2.459,0,0,0,.5,3.1,2.458,2.458,0,0,0,3.1,5.7H7.76L16.9,32.022Z"
                                        transform="translate(0.95 0.949)" fill="none" stroke="#fff"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                    <circle id="Ellipse_2486" data-name="Ellipse 2486" cx="4.471" cy="4.471"
                                        r="4.471" transform="translate(19.95 36.071)" fill="none" stroke="#fff"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                    <circle id="Ellipse_2487" data-name="Ellipse 2487" cx="4.471" cy="4.471"
                                        r="4.471" transform="translate(35.524 36.071)" fill="none" stroke="#fff"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                </g>
                            </g>
                            <g id="Group_12337" data-name="Group 12337" transform="translate(30.205 0)">
                                <ellipse id="Ellipse_2490" data-name="Ellipse 2490" cx="12.665" cy="12.665"
                                    rx="12.665" ry="12.665" fill="#91a13b" stroke="#fff" stroke-miterlimit="10"
                                    stroke-width="1.41" />
                                <g id="Group_12296" data-name="Group 12296"
                                    transform="translate(17.032 20.929) rotate(180)">
                                    <path id="Path_296" data-name="Path 296" d="M4.03,2.23,0,4.715.43,0"
                                        transform="translate(0 10.2)" fill="none" stroke="#fff"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                    <rect id="Rectangle_1330" data-name="Rectangle 1330" width="4.235" height="11.999"
                                        transform="translate(6.75 0) rotate(31.78)" fill="none" stroke="#fff"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <div class="text-center" style="margin-bottom: 40px!important" id="juices">
                <h2 id="tt1" style="margin-top: 30px!important">ALL JUICES</h2>
                <h4 id="title4"> <a href="#vinegar"> Go to vinegars <img src="{{ asset('img/down.svg') }}"
                            style="width: 20px;"> </a></h4>

            </div>
            <div class="d-flex filter">
                {{-- filter  --}}
                <div class="" style="width:300px">
                    <div class=" d-inline-flex">

                        <h4 id="txt14">SORT BY</h4>

                    </div>
                    <div class="d-inline-flex fliterclear">
                        <a href="">
                            <h4 id="txt111"> clear all</h4>
                        </a>
                    </div>

                    <div>
                        <h4 id="txt19">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne"
                                style="border: none;background-color:transparent;color:#768791">
                                Categories
                            </button>
                        </h4>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="txt19"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="radio" id="age1" name="age" value="30">
                                <label for="Juices">Juices</label>
                                <br>
                                <input type="radio" name="Vinegars">
                                <label for="Vinegars">Vinegars</label><br>
                                <hr>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <h4 id="txt19">Categories</h4>
                        <hr>
                        <input type="radio" id="age1" name="age" value="30">
                        <label for="Juices">Juices</label>
                        <br>
                        <input type="radio" name="Vinegars">
                        <label for="Vinegars">Vinegars</label><br>
                        <hr>
                    </div> --}}

                    <div class="gidd">
                        <h4 id="txt19">Size</h4>
                        <hr>
                        <input type="radio" name="Juices" id="" value="">
                        <label for="250ml" class="number">250ml</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="750ml" class="number">750ml</label><br>
                        <hr>
                    </div>

                    <div>
                        <h4 id="txt19">Packs</h4>
                        <hr>
                        <input type="radio" name="Juices" id="" value="">
                        <label for="Pack of 3" data-filter="Pack of 3">Pack of 3</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="Pack of 6" data-filter="Pack of 6">Pack of 6</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="Pack of 12" data-filter="Pack of 12">Pack of 12</label><br>
                        <hr>
                    </div>

                    <div style="display: block">
                        <h4 id="txt19">Flavors</h4>
                        <hr>
                        <input type="radio" name="Juices" id="" value="">
                        <label for="html" data-filter="Apple-Based Juices">Apple-Based Juices</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple Juice">Apple Juice</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Carrot">Apple & Carrot</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Pear">Apple & Pear</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Cherry">Apple & Cherry</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Apricot">Apple & Apricot</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Peach">Apple & Peach</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Mulberry">Apple & Mulberry</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Apple & Kiwi">Apple & Kiwi</label><br>
                        <hr>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Citrus-Based Juices">Citrus-Based Juices</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Orange Juice">Orange Juice</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Pomegranate Juice">Pomegranate Juice</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Red Orange Juice">Red Orange Juice</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Grapefruit Juice">Grapefruit Juice</label><br>
                        <input type="radio" name="Vinegars" id="">
                        <label for="html" data-filter="Clementine Juice">Clementine Juice</label><br>
                        <hr>
                    </div>

                </div>

                @foreach ($category_juices->products as $p)
                    @include('layouts.product-juices')
                @endforeach
                <div class="container-fluid" style="background-color: #eee">


                    <div class="text-center" style="margin-bottom: 40px!important" id="vinegar">
                        <h2 id="tt1" style="margin-top: 30px!important">ALL Vinegars</h2>
                        <h4 id="title4"><a href="#juices">Go to juices <img src="{{ asset('img/up.svg') }}"
                                    style="width: 20px;"></a></h4>
                    </div>
                    <div class="container">
                        <div class="row">
                            {{-- <div class="" style="width:250px"></div> --}}

                            <div class="col d-flex justify-content-evenly vinegar">
                                {{-- {{ dd($category->products) }} --}}
                                @foreach ($category->products as $prod)
                                    <?php
                                    if ($prod->seo_url) {
                                        $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($prod->seo_url)));
                                    } else {
                                        $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($prod->title)));
                                    } ?>
                                    <div class="card" style="border:none; background:#eee">
                                        <div class="card-header" style="background:#fff; border:none!important">
                                            <a href="{{ route('eshop_product_path', [$prod->id, $seo_url]) }}">
                                                <img id="impic2" src="{{ url('assets/vinepack.png') }}"
                                                    alt=""></a>
                                            <p id="number-1">x6</p>
                                        </div>
                                        <div class="card-body">

                                            <h4 id="titlep">{{ $prod->title }}</h4>
                                            <div class=" d-flex">
                                                @if ($prod->firstVariant->continue_selling != 0 || $prod->inStock != 0)
                                                    <input type="hidden" class="csrf-token" name="_token"
                                                        value="{{ csrf_token() }}">
                                                    <input type="hidden" value="1" name="qty"
                                                        class="add_to_cart_qty" class="qty-input">
                                                    <input type="hidden" name="product_id"
                                                        class="add_to_cart_variant_id" value="{{ $prod->id }}">
                                                    <a href="#" onclick="addToCart({{ $prod->id }}, '1')"
                                                        id="log">
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add
                                                        to</a>
                                                    &nbsp;&nbsp;<p id="log">| </p>&nbsp;&nbsp;
                                                    <a href="{{ route('customize.step-one') }}" id="log"><i
                                                            class="fa fa-cart-plus" aria-hidden="true"></i>Customize</a>

                                                    <input type="hidden" name="product_id" id="add_to_cart_variant_id"
                                                        value="{{ $prod->id }}">
                                                @else
                                                    <span><b>Out of Stock</b></span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="card" style="border: none; background:#eee">
                                    <div class="card-header" style="background:#fff ; border:none!important">
                                        <img id="impic2" src="{{ url('assets/vinepack.png') }}" alt="">
                                        <p id="number-1">x6</p>
                                    </div>
                                    <div class="card-body">

                                        <h4 id="titlep">FILTERED APPLE CIDER VINEGAR</h4>
                                        <div class=" d-flex">
                                            <a href="" id="log"><i class="fa fa-shopping-cart"
                                                    aria-hidden="true"></i>Add
                                                to</a>
                                            &nbsp;&nbsp; <p id="log">| </p>&nbsp;&nbsp;
                                            <a href="" id="log"><i class="fa fa-cart-plus"
                                                    aria-hidden="true"></i>Customize</a>
                                        </div>

                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end section All vinegars --}}

        <div class="text-center" id="mgt3">
            <h2 id="tt2">WHAT OTHERS ARE SAYING ABOUT OUR PRODUCTS</h2>
        </div>
        <div class="review">
            <div class="container">
                <div class="row">
                    <div class="col review1">
                        <i id="quotation" class="fa fa-quote-left" aria-hidden="true"></i>
                        <div class="border4">
                            <div class="text-center">
                                <div id="TableList"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col review3" id="mgt3">
                        <i id="quotation" class="fa fa-quote-left" aria-hidden="true"></i>
                        <div class="border4">
                            <div class="text-center">
                                <div id="TableList"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col review2">
                        <i id="quotation" class="fa fa-quote-left" aria-hidden="true"></i>
                        <div class="border4">
                            <div class="text-center">
                                <div id="TableList"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col btn-review">
                    <a href="javascript:prevPage()" id="btn_prev">
                        < </a>&nbsp;
                            <a href="javascript:nextPage()" id="btn_next"> > </a><br>&nbsp;
                            {{-- page: <span id="page"></span> --}}
                </div>
                <div class="text-center" id="mgt3">
                    <button class="btnbtn btnwrite" style="border-radius: 25px">WRITE A REVIEW </button>

                </div>
            </div>
        </div>
        {{-- only screnn mobile custom design  --}}
        <div class="review-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 review1">
                        <i id="quotation" class="fa fa-quote-left" aria-hidden="true"></i>
                        <div class="border4">
                            <div class="text-center">
                                <div id="TableList"></div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col btn-reviewM">
                    <a href="javascript:prevPage()" id="btn_prevM">
                        < </a>&nbsp;
                            <a href="javascript:nextPage()" id="btn_nextM"> > </a><br>&nbsp;
                            {{-- page: <span id="page"></span> --}}
                </div>
                <div class="text-center">
                    <button class="btnbtn btnwrite" style="border-radius: 25px">WRITE A REVIEW </button>

                </div>
            </div>
        </div>

        {{-- end custom design review --}}



        <script src="{{ url('js/filterjuice.js') }}"></script>
        <script>
            $gidd.isotope({
                filter: function() {
                    var number = $(this).find('.number').text();
                    return parseInt(number, 10) = 250;
                }
            });
            $gidd.isotope({
                filter: function() {
                    var number = $(this).find('.number').text();
                    return parseInt(number, 10) = 750;
                }
            });
            var $gidd = $('.gidd').isotope({

            });

            $('.filter-button-group').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $gidd.isotope({
                    filter: filterValue
                });
            });
        </script>
    @endsection
