@extends('layouts.app')

@section('content')
    <style>
        .myRound {
            border-color: red;
        }

        .myRound1 {
            border-color: red;
        }
    </style>
    <?php
    if ($product->seo_url) {
        $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($product->seo_url)));
    } else {
        $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($product->title)));
    } ?>
    <!--== Start Header Area Wrapper ==-->
    <section class="header-area style-1">
        <div class="container-fluid">
            <div class="row pt-30 pt-100">
                <div class="col-lg-12">
                    <div class="bread-crumbs">
                        <a href="/">Home </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <span class="active"> Eshop</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-80 mt-100">
                <div class="col-md-6 col-xl-5 text-center">
                    <h4></h4>
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="slideContainer">
                    <div class="Slide">
                        @foreach ($product->photoGallery as $g)
                            <img src="{{ $g->md_img }}" alt="{{ $product->title }}" width="330" height="330">
                        @endforeach
                    </div>
                    {{-- <div class="Slide">
                        <img src="{{ url('assets/juicepack.png') }}" />

                    </div>
                    <div class="Slide">
                        <img src="{{ url('assets/juicepack.png') }}" />
                    </div> --}}
                    <a class="prevBtn" data-slide="prev"></a>
                    <a class="nextBtn" data-slide="next"></a>
                </div>
                <br />
                <div class="thumbnail">
                    <div class="imageCol">
                        <style>
                            .containerr {
                                position: relative;
                                width: 100%;
                            }

                            .imageCol {
                                display: flex;
                                width: 30%;
                            }

                            .overlay {
                                position: absolute;
                                top: 0;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                height: 110px;
                                width: 80px;
                                opacity: 0;
                                transition: .5s ease;
                                background-color: #B21F1C;
                                z-index: 9;
                            }

                            .thumbImage img {
                                max-width: 150px;
                                width: 150px;
                            }

                            .containerr:hover .overlay {
                                opacity: 1;
                            }

                            .text {
                                color: white;
                                font-size: 20px;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                -webkit-transform: translate(-50%, -50%);
                                -ms-transform: translate(-50%, -50%);
                                transform: translate(-50%, -50%);
                                text-align: center;
                            }
                        </style>


                        <div class="containerr">
                            <img class="thumbImage" src="{{ url('assets/juicepack.png') }}" onclick="setSlide(1)"
                                alt="Cinque Terre">
                            <div class="overlay">
                                <div class="text">Apple & Cherry</div>
                            </div>
                        </div>
                        <div class="containerr">
                            <img class="thumbImage" src="{{ url('assets/juicepack.png') }}" onclick="setSlide(2)"
                                alt="Cinque Terre">
                            <div class="overlay">
                                <div class="text">Apple & Cherry</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="background-color: rgba(179, 179, 179, 0.216)">
                <div class="supercol">
                    <h2 id="ff">{{ $product->title }}</h2>
                    <h2 id="ff1">{{ $product->description }}</h2>

                    <div class="product-price">
                        <h2 id="ff2" class="new-price">
                            {{ $product->firstVariant->price }} </h2>

                        @if ($product->firstVariant->compare_at_price != null)
                            <h2 id="ff2">{{ $product->firstVariant->compare_at_price }}
                            </h2>
                        @endif

                        <span id="ff2" class="new" style="margin-left: 0;"></span>
                    </div>
                    <div class="row" id="mgt20">
                        <div class="col">
                            <h4 id="txt14">CHOOSE YOUR FORMAT</h4>
                            <span style="border:1 solid red;"><span>
                        </div>
                        <div class="col">
                            <h4 id="txt14">PACKS QUANTITY</h4>
                        </div>
                    </div>

                    @if ($product->firstVariant->continue_selling != 0 || $product->inStock != 0)
                        <form class="cart-form">
                            <input class="csrf-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="product_id" id="add_to_cart_variant_id" value="{{ $product->id }}">
                            <div class="row" id="mgt9">
                                @if (!empty($options['option1_name']['options']))
                                    <div class="product-form product-variation-form product-option1-swatch col">
                                        {{-- <label>{{ $options['option1_name']['name'] }} :</label> --}}
                                        <div class="d-flex align-items-center product-variations" id="option1">
                                            @foreach ($options['option1_name']['options'] as $o)
                                                @if (!empty($o))
                                                    <a href="#" id="round" class="round"><span
                                                            class="size">{{ $o }}</span></a>
                                                @endif
                                            @endforeach

                                            <input type="text" name="option1_value" id="option1_value"
                                                value="{{ $options['option1_name']['options'][0] }}" hidden>
                                        </div>
                                    </div>
                                @endif
                                {{-- <div class="col">
                                    <button onclick="" type="submit" id="round" class="round">250ml</button>
                                    <button onclick="" type="submit" id="round1" class="round">750ml</button>
                                </div> --}}
                                @if (!empty($options['option2_name']['options']))
                                    <div class="product-form product-variation-form product-option2-swatch">
                                        <label class="mb-1">{{ $options['option2_name']['name'] }} :</label>
                                        <div class="flex-wrap d-flex align-items-center product-variations"id="option2">
                                            @foreach ($options['option2_name']['options'] as $o)
                                                @if (!empty($o))
                                                    <a href="#">{{ $o }}</a>
                                                @endif
                                            @endforeach
                                            <input hidden name="option2_value" id="option2_value"
                                                value="{{ $options['option2_name']['options'][0] }}">
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($options['option3_name']['options']))
                                    <div class="product-form product-variation-form product-option3-swatch">
                                        <label class="mb-1">{{ $options['option3_name']['name'] }} :</label>
                                        <div class="flex-wrap d-flex align-items-center product-variations"id="option3">
                                            @foreach ($options['option3_name']['options'] as $o)
                                                @if (!empty($o))
                                                    <a href="#">{{ $o }}</a>
                                                @endif
                                            @endforeach
                                            <input hidden name="option3_value" id="option3_value"
                                                value="{{ $options['option3_name']['options'][0] }}">
                                        </div>
                                    </div>
                                @endif

                                <div class="col" id="mgt9">
                                    <div id="zz">
                                        <div class="counter">
                                            <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                            <input type="text" value="1" name="qty" id="add_to_cart_qty"
                                                class="input-qty">
                                            <span class="up" onClick='increaseCount(event, this)'>+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="mgt20" style="display:inline-flex!important">
                                <div class="col">
                                    <button type="button" id="submit_addtocart" value="Open Curtain"
                                        class="myButton">Add to
                                        cart</button>
                                </div>
                        </form>
                    @else
                        <div class="product-buttons" style="margin-left: 0">
                            <span><b>Out of Stock</b></span>
                        </div>
                    @endif
                    <div class="col packSvg">
                        {{-- custumize your pack --}}

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="221.581" height="64.59" viewBox="0 0 221.581 64.59">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_1327" data-name="Rectangle 1327" width="68.726" height="61.124"
                                        fill="none" stroke="#fff" stroke-width="1.41" />
                                </clipPath>
                            </defs>
                            <g id="Group_12237" data-name="Group 12237" transform="translate(-1088.85 -271.474)"
                                style="mix-blend-mode: multiply;isolation: isolate">
                                <text id="CUSTOMIZE_YOUR_PACK"
                                    data-name="CUSTOMIZE
                                YOUR PACK"
                                    transform="translate(1237.431 301.269)" fill="#91a13b" font-size="24"
                                    font-family="Helvetica-Bold, Helvetica" font-weight="700" letter-spacing="-0.01em"
                                    opacity="0.89">
                                    <tspan x="-72.707" y="0">CUSTOMIZE </tspan>
                                    <tspan x="-70.161" y="27">YOUR PACK</tspan>
                                </text>
                                <g id="Group_12542" data-name="Group 12542" transform="translate(1088.85 272.179)">
                                    <g id="Group_12336" data-name="Group 12336" transform="translate(0 2.761)">
                                        <g id="Group_12268" data-name="Group 12268" transform="translate(0 0)"
                                            clip-path="url(#clip-path)">
                                            <path id="Path_293" data-name="Path 293"
                                                d="M29.069,42.007H57.524a3.4,3.4,0,0,0,3.429-2.4h0l4.3-27.009a3.377,3.377,0,0,0-3.082-4.451H18.29L16.482,2.9A3.4,3.4,0,0,0,13.061.5H3.925A3.235,3.235,0,0,0,.5,3.925,3.234,3.234,0,0,0,3.925,7.347h6.126L22.07,41.969Z"
                                                transform="translate(1.407 1.407)" fill="none" stroke="#91a13b"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                            <g id="Group_12543" data-name="Group 12543">
                                                <circle id="Ellipse_2486" data-name="Ellipse 2486" cx="5.882"
                                                    cy="5.882" r="5.882" transform="translate(26.246 47.455)"
                                                    fill="none" stroke="#91a13b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.41" />
                                                <circle id="Ellipse_2487" data-name="Ellipse 2487" cx="5.882"
                                                    cy="5.882" r="5.882" transform="translate(46.734 47.455)"
                                                    fill="none" stroke="#91a13b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.41" />
                                            </g>
                                        </g>
                                    </g>
                                    <g id="Group_12337" data-name="Group 12337" transform="translate(39.736 0)">
                                        <ellipse id="Ellipse_2490" data-name="Ellipse 2490" cx="16.662"
                                            cy="16.661" rx="16.662" ry="16.661" fill="#fff"
                                            stroke="#91a13b" stroke-miterlimit="10" stroke-width="1.41" />
                                        <g id="Group_12296" data-name="Group 12296"
                                            transform="translate(22.406 27.534) rotate(180)">
                                            <path id="Path_296" data-name="Path 296" d="M5.3,2.934,0,6.2.566,0"
                                                transform="translate(0 13.419)" fill="none" stroke="#91a13b"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41" />
                                            <rect id="Rectangle_1330" data-name="Rectangle 1330" width="5.571"
                                                height="15.786" transform="translate(8.88 0) rotate(31.78)"
                                                fill="none" stroke="#91a13b" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.41" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class=" d-flex nutrition">
                    <svg id="Group_11774" data-name="Group 11774" xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25" viewBox="0 0 25 25">
                        <g id="Ellipse_2433" data-name="Ellipse 2433" fill="none" stroke="#91a13b" stroke-width="1">
                            <circle cx="12.5" cy="12.5" r="12.5" stroke="none" />
                            <circle cx="12.5" cy="12.5" r="12" fill="none" />
                        </g>
                        <g id="Group_11565" data-name="Group 11565" transform="translate(9.123 12.372)">
                            <line id="Line_12" data-name="Line 12" y1="7.263"
                                transform="translate(7.263 0) rotate(90)" fill="none" stroke="#91a13b"
                                stroke-width="1" />
                        </g>
                        <g id="Group_11912" data-name="Group 11912" transform="translate(12.755 8.741) rotate(90)">
                            <line id="Line_12-2" data-name="Line 12" y1="7.263"
                                transform="translate(7.263 0) rotate(90)" fill="none" stroke="#91a13b"
                                stroke-width="1" />
                        </g>
                    </svg>
                    <h2 id="txtN">Nutrition facts & Ingredients</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="text-center" id="mgt3">
        <h2 id="txt71">OTHER FLAVORS <br> YOU MIGHT LIKE</h2>
    </div>

    <div class="text-center mixitupWrapper filter-btn" id="mgt9">


        @foreach ($product->categories as $pc)
            <button class="btnbtn3 filterButton" data-filter=".category_{{ $pc->title }}">
                {{ $pc->title }}</button>
        @endforeach
    </div>

    <div class="container mixContainer" id="mgt3" style=" padding-bottom:100px">
        <div class="row text-center mix">

            @foreach ($related_products as $p)
                <div class="col-lg-4 col-md-6 col-sm-6 pro-f"><a
                        href="{{ route('eshop_product_path', [$p->id, $seo_url]) }}"> <img id="impic"
                            src="{{ $p->firstVariant->sm_img }}" alt="{{ $p->title }}"></a>
                    <div id="mgt01">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="269.136" height="38" viewBox="0 0 269.136 38">
                            <defs>
                                <clipPath id="clip-path">
                                    <rect id="Rectangle_1376" data-name="Rectangle 1376" width="20.274" height="18.013"
                                        fill="none" stroke="#91a13b" stroke-width="1" />
                                </clipPath>
                            </defs>
                            <text id="x12" fill="#b8ba43" font-size="25" font-family="Helvetica-Bold, Helvetica"
                                font-weight="700" letter-spacing="-0.07em">
                                <tspan x="0" y="23">x12</tspan>
                            </text>
                            <g id="Group_12518" data-name="Group 12518" transform="translate(251.862 21.988)">
                                <g id="Group_12346" data-name="Group 12346" transform="translate(-3 -2)"
                                    clip-path="url(#clip-path)">
                                    <path id="Path_299" data-name="Path 299"
                                        d="M11.588.5A4.284,4.284,0,0,0,8.324,2.053,4.257,4.257,0,0,0,5.047.5C2.54.5.5,2.82.5,5.673c0,4.8,7.164,9.431,7.469,9.626a.648.648,0,0,0,.695,0c.305-.193,7.472-4.772,7.472-9.628C16.135,2.82,14.1.5,11.588.5Z"
                                        transform="translate(1.82 1.057)" fill="none" stroke="#91a13b"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h4 id="txt14">{{ $p->title }}</h4>
                    <h4 id="cart-custom">

                        @if ($p->firstVariant->continue_selling != 0 || $p->inStock != 0)
                            <input type="hidden" class="csrf-token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="1" name="qty" class="add_to_cart_qty"
                                class="qty-input">
                            <input type="hidden" name="product_id" class="add_to_cart_variant_id"
                                value="{{ $p->id }}">
                            <a href="#" onclick="addToCart({{ $p->id }}, '1')" id="log">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="232.182" height="19.73" viewBox="0 0 232.182 19.73">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_1327" data-name="Rectangle 1327" width="18.018"
                                                height="16.025" transform="translate(0 0)" fill="none"
                                                stroke="#91a13b" stroke-width="1" />
                                        </clipPath>
                                    </defs>
                                    <text id="Add_to_cart" data-name="Add to cart" transform="translate(22 2.73)"
                                        fill="#91a13b" font-size="15" font-family="Helvetica-Bold, Helvetica"
                                        font-weight="700" letter-spacing="-0.01em">
                                        <tspan x="0" y="12">Add to </tspan>
                                    </text>
                                    <text id="Customize" transform="translate(159.182 2.73)" fill="#91a13b"
                                        font-size="15" font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                        letter-spacing="-0.01em">
                                        <tspan x="0" y="12">Customiz</tspan>
                                    </text>
                                    <g id="Group_12269" data-name="Group 12269" transform="translate(0 3.705)">
                                        <g id="Group_12268" data-name="Group 12268" clip-path="url(#clip-path)">
                                            <path id="Path_293" data-name="Path 293"
                                                d="M7.99,11.382h7.46a.892.892,0,0,0,.9-.628h0l1.127-7.081a.885.885,0,0,0-.808-1.167H5.164L4.69,1.128A.892.892,0,0,0,3.793.5H1.4a.848.848,0,0,0-.9.9.848.848,0,0,0,.9.9H3l3.151,9.077Z"
                                                fill="none" stroke="#91a13b" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                            <circle id="Ellipse_2486" data-name="Ellipse 2486" cx="1.542"
                                                cy="1.542" r="1.542" transform="translate(6.881 12.441)"
                                                fill="none" stroke="#91a13b" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                            <circle id="Ellipse_2487" data-name="Ellipse 2487" cx="1.542"
                                                cy="1.542" r="1.542" transform="translate(12.253 12.441)"
                                                fill="none" stroke="#91a13b" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                        </g>
                                    </g>
                                    <line id="Line_93" data-name="Line 93" y2="16"
                                        transform="translate(115.5 3.561)" fill="none" stroke="#91a13b"
                                        stroke-width="1" opacity="0.748" />
                                    <g id="Group_12270" data-name="Group 12270" transform="translate(139.203 -8.432)">
                                        <ellipse id="Ellipse_2466" data-name="Ellipse 2466" cx="5.609"
                                            cy="5.609" rx="5.609" ry="5.609"
                                            transform="translate(5.579 8.932)" fill="#fff" stroke="#91a13b"
                                            stroke-miterlimit="10" stroke-width="1" />
                                        <path id="Path_239" data-name="Path 239" d="M1.881,1.041l-1.572.7L.2,0"
                                            transform="translate(13.737 13.069) rotate(180)" fill="none"
                                            stroke="#91a13b" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <rect id="Rectangle_1122" data-name="Rectangle 1122" width="1.977"
                                            height="5.601" transform="translate(10.319 18.215) rotate(-148.22)"
                                            fill="none" stroke="#91a13b" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1" />
                                    </g>
                                </svg></a>
                            <input type="hidden" name="product_id" id="add_to_cart_variant_id"
                                value="{{ $p->id }}">
                        @else
                            <span><b>Out of Stock</b></span>
                        @endif
                    </h4>
                </div>
            @endforeach

        </div>
    </div>

    <div style="background-color:
            rgba(179, 179, 179, 0.216); padding-bottom:20px; padding-top:20px">
        <div class="text-center" id="mgt3">
            <h2 id="txt71">YOU MIGHT WANT TO<br> TRY OUT OUR VINEGARS</h2>
        </div>

        <div class="container" id="mgt3">
            <div class="row">
                {{-- {{ dd($category) }} --}}
                @foreach ($category->products as $p)
                    <div class="col-lg-6 col-md-6">

                        <div class="card" style="border: none; width:80%">
                            <a href="{{ route('eshop_product_path', [$p->id, $seo_url]) }}">

                                <img id="impic1" src="{{ $p->firstVariant->sm_img }}" alt="{{ $p->title }}"
                                    style="background-color: #fff"></a>
                            <div id="mgt01">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="269.136" height="38" viewBox="0 0 269.136 38">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_1376" data-name="Rectangle 1376" width="20.274"
                                                height="18.013" fill="none" stroke="#91a13b" stroke-width="1" />
                                        </clipPath>
                                    </defs>
                                    <text id="x12" fill="#b8ba43" font-size="25"
                                        font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                        letter-spacing="-0.07em">
                                        <tspan x="0" y="23">x6</tspan>
                                    </text>
                                    <g id="Group_12518" data-name="Group 12518" transform="translate(251.862 21.988)">
                                        <g id="Group_12346" data-name="Group 12346" transform="translate(-3 -2)"
                                            clip-path="url(#clip-path)">
                                            <path id="Path_299" data-name="Path 299"
                                                d="M11.588.5A4.284,4.284,0,0,0,8.324,2.053,4.257,4.257,0,0,0,5.047.5C2.54.5.5,2.82.5,5.673c0,4.8,7.164,9.431,7.469,9.626a.648.648,0,0,0,.695,0c.305-.193,7.472-4.772,7.472-9.628C16.135,2.82,14.1.5,11.588.5Z"
                                                transform="translate(1.82 1.057)" fill="none" stroke="#91a13b"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 id="txt14">APPLE CIDER VINEGAR</h4>
                            <h4>
                                @if ($p->firstVariant->continue_selling != 0 || $p->inStock != 0)
                                    <input type="hidden" class="csrf-token" name="_token"
                                        value="{{ csrf_token() }}">
                                    <input type="hidden" value="1" name="qty" class="add_to_cart_qty"
                                        class="qty-input">
                                    <input type="hidden" name="product_id" class="add_to_cart_variant_id"
                                        value="{{ $p->id }}">
                                    <a href="#" onclick="addToCart({{ $p->id }}, '1')" id="log">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="232.182" height="19.73" viewBox="0 0 232.182 19.73">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <rect id="Rectangle_1327" data-name="Rectangle 1327" width="18.018"
                                                        height="16.025" transform="translate(0 0)" fill="none"
                                                        stroke="#91a13b" stroke-width="1" />
                                                </clipPath>
                                            </defs>
                                            <text id="Add_to_cart" data-name="Add to cart" transform="translate(22 2.73)"
                                                fill="#91a13b" font-size="15" font-family="Helvetica-Bold, Helvetica"
                                                font-weight="700" letter-spacing="-0.01em">
                                                <tspan x="0" y="12">Add to </tspan>
                                            </text>
                                            <text id="Customize" transform="translate(159.182 2.73)" fill="#91a13b"
                                                font-size="15" font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                                letter-spacing="-0.01em">
                                                <tspan x="0" y="12">Customiz</tspan>
                                            </text>
                                            <g id="Group_12269" data-name="Group 12269" transform="translate(0 3.705)">
                                                <g id="Group_12268" data-name="Group 12268" clip-path="url(#clip-path)">
                                                    <path id="Path_293" data-name="Path 293"
                                                        d="M7.99,11.382h7.46a.892.892,0,0,0,.9-.628h0l1.127-7.081a.885.885,0,0,0-.808-1.167H5.164L4.69,1.128A.892.892,0,0,0,3.793.5H1.4a.848.848,0,0,0-.9.9.848.848,0,0,0,.9.9H3l3.151,9.077Z"
                                                        fill="none" stroke="#91a13b" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1" />
                                                    <circle id="Ellipse_2486" data-name="Ellipse 2486" cx="1.542"
                                                        cy="1.542" r="1.542" transform="translate(6.881 12.441)"
                                                        fill="none" stroke="#91a13b" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1" />
                                                    <circle id="Ellipse_2487" data-name="Ellipse 2487" cx="1.542"
                                                        cy="1.542" r="1.542"
                                                        transform="translate(12.253 12.441)" fill="none"
                                                        stroke="#91a13b" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1" />
                                                </g>
                                            </g>
                                            <line id="Line_93" data-name="Line 93" y2="16"
                                                transform="translate(115.5 3.561)" fill="none" stroke="#91a13b"
                                                stroke-width="1" opacity="0.748" />
                                            <g id="Group_12270" data-name="Group 12270"
                                                transform="translate(139.203 -8.432)">
                                                <ellipse id="Ellipse_2466" data-name="Ellipse 2466" cx="5.609"
                                                    cy="5.609" rx="5.609" ry="5.609"
                                                    transform="translate(5.579 8.932)" fill="#fff" stroke="#91a13b"
                                                    stroke-miterlimit="10" stroke-width="1" />
                                                <path id="Path_239" data-name="Path 239" d="M1.881,1.041l-1.572.7L.2,0"
                                                    transform="translate(13.737 13.069) rotate(180)" fill="none"
                                                    stroke="#91a13b" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1" />
                                                <rect id="Rectangle_1122" data-name="Rectangle 1122" width="1.977"
                                                    height="5.601" transform="translate(10.319 18.215) rotate(-148.22)"
                                                    fill="none" stroke="#91a13b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" />
                                            </g>

                                        </svg></a>


                                    <input type="hidden" name="product_id" id="add_to_cart_variant_id"
                                        value="{{ $p->id }}">
                                @else
                                    <span><b>Out of Stock</b></span>
                                @endif


                            </h4>
                        </div>
                @endforeach
            </div>

            {{-- <div class="col-lg-6 col-md-6">
                    <div class="card" style="border: none; width:80%">
                        <img id="impic1" src="{{ url('assets/vinepack2.png') }}" alt="">
                        <div id="mgt01">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="269.136" height="38" viewBox="0 0 269.136 38">
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect id="Rectangle_1376" data-name="Rectangle 1376" width="20.274"
                                            height="18.013" fill="none" stroke="#91a13b" stroke-width="1" />
                                    </clipPath>
                                </defs>
                                <text id="x6" fill="#b8ba43" font-size="30"
                                    font-family="Helvetica-Bold, Helvetica" font-weight="700" letter-spacing="-0.07em">
                                    <tspan x="0" y="23">x6</tspan>
                                </text>
                                <g id="Group_12518" data-name="Group 12518" transform="translate(251.862 21.988)">
                                    <g id="Group_12346" data-name="Group 12346" transform="translate(-3 -2)"
                                        clip-path="url(#clip-path)">
                                        <path id="Path_299" data-name="Path 299"
                                            d="M11.588.5A4.284,4.284,0,0,0,8.324,2.053,4.257,4.257,0,0,0,5.047.5C2.54.5.5,2.82.5,5.673c0,4.8,7.164,9.431,7.469,9.626a.648.648,0,0,0,.695,0c.305-.193,7.472-4.772,7.472-9.628C16.135,2.82,14.1.5,11.588.5Z"
                                            transform="translate(1.82 1.057)" fill="none" stroke="#91a13b"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                  
                </div> --}}
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>

    <script src="{{ url('js/applejuice.js') }}"></script>


    <script>
        var containerEl = document.querySelector('.mixitupWrapper');

        var mixer = mixitup(containerEl, {
            controls: {
                toggleLogic: 'and'
            }
        });
    </script>
@endsection
