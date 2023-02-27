<?php
if ($p->seo_url) {
    $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($p->seo_url)));
} else {
    $seo_url = str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($p->title)));
} ?>

<div class="container">
    {{-- start section juices --}}
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-10 justify-content-sm-center">
            <div class="card" style="border: none">
                <a href="{{ route('eshop_product_path', [$p->id, $seo_url]) }}">
                    <img id=" impic2" src="{{ $p->firstVariant->sm_img }}" alt="{{ $p->title }}" /> </a>
                <p id="number"
                    style="
                             transform: translate(-80px,30px)!important ; font-size:25px">
                    x12</p>

            </div>
            <div class="card-body">
                <h4 id="titlep">APPLE & CARROT</h4>

                <form>
                    <div class=" d-flex">
                        @if ($p->firstVariant->continue_selling != 0 || $p->inStock != 0)
                            <input type="hidden" class="csrf-token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="1" name="qty" class="add_to_cart_qty"
                                class="qty-input">
                            <input type="hidden" name="product_id" class="add_to_cart_variant_id"
                                value="{{ $p->id }}">
                            <a href="#" onclick="addToCart({{ $p->id }}, '1')" id="log">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add
                                to</a>
                            &nbsp;&nbsp;<p id="log">| </p>&nbsp;&nbsp;
                            <a href="{{ route('customize.step-one') }}" id="log"><i class="fa fa-cart-plus"
                                    aria-hidden="true"></i>Customize</a>

                            <input type="hidden" name="product_id" id="add_to_cart_variant_id"
                                value="{{ $p->id }}">
                        @else
                            <span><b>Out of Stock</b></span>
                        @endif

                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- <div class="col-lg-4 col-md-6 col-sm-10 justify-content-sm-center">
            <div class="card" style="border: none">
                <img id="impic2" src="{{ url('assets/juicepack.png') }}" alt="">
    <p id="number" style="
                             transform: translate(-80px,30px)!important ; font-size:25px">
        x12</p>
</div>
<div class="card-body">
    <h4 id="titlep">APPLE & CARROT</h4>
    <div class=" d-flex">
        <a href="{{ route('eshop_product_path', ['1', 'test']) }}" id="log"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add
            to</a>
        &nbsp;&nbsp; <p id="log">| </p>&nbsp;&nbsp;
        <a href="{{ route('customize_path') }}" id="log"><i class="fa fa-cart-plus" aria-hidden="true"></i>Customize</a>
    </div>
</div>
</div> --}}
    {{-- <div class="col-lg-4 col-md-6 col-sm-10 justify-content-sm-center">
            <div class="card" style="border: none">
                <img id="impic2" src="{{ url('assets/juicepack.png') }}" alt="">
<p id="number" style="
                             transform: translate(-80px,30px)!important ; font-size:25px">
    x12</p>

</div>
<div class="card-body">
    <h4 id="titlep">APPLE & CARROT</h4>
    <div class=" d-flex">
        <a href="{{ route('eshop_product_path', ['1', 'test']) }}" id="log"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add
            to cart</a>
        &nbsp;&nbsp; <p id="log">| </p>&nbsp;&nbsp;
        <a href="{{ route('customize_path') }}" id="log"><i class="fa fa-cart-plus" aria-hidden="true"></i>Customize</a>
    </div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-10">
    <div class="card" style="border: none">
        <img id="impic2" src="{{ url('assets/juicepack.png') }}" alt="">
        <p id="number" style="
                             transform: translate(-80px,30px)!important ; font-size:25px">
            x12</p>

    </div>
    <div class="card-body">
        <h4 id="titlep">APPLE & CARROT</h4>
        <div class=" d-flex">

            <a onclick="addToCart('2', '1')" id="log"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add
                to cart</a>
            &nbsp;&nbsp; <p id="log">| </p>&nbsp;&nbsp;
            <a href="{{ route('customize_path') }}" id="log"><i class="fa fa-cart-plus" aria-hidden="true"></i>Customize</a>
        </div>
    </div>
</div> --}}

</div>
</div>
