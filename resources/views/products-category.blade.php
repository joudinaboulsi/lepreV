@extends('layouts.app')

@section('content')
    <!--== Start Category Area Wrapper ==-->
    @if (!empty($data->components->subcategories->value))
        @include('partials.subcategories')
    @else
        <section class="divider-area style-3 bg-img parallax" data-bg-img="{{ $data->components->banner_image->lg_img }}">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 ml-50">
                        <div class="divider-content divider-content-style2 flex-column" data-aos="fade-up"
                            data-aos-duration="1000">
                            <h2>{{ $data->components->title->value }}</h2>
                            <h3 class="align-self-start">{{ $data->components->title_2->value }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--== End Category Area Wrapper ==-->

    <!--== Start Header Area Wrapper ==-->
    <section class="header-area style-4">
        <div class="container-fluid">
            <div class="row pt-10 pb-10">
                <div class="col-lg-12">
                    <div class="bread-crumbs">
                        <a href="/">Home </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <a href="{{ route('products_category_path', [26, 'juices']) }}">Products </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <span class="active"> {{ $data->components->title->value }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header-area style-4 bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center pb-80 pt-100">
                <div class="col-md-6 col-xl-5 text-center">
                    <h4>{{ $data->components->products_subtitle->value }}</h4>
                    <h2>{{ $data->components->products_title->value }}</h2>
                </div>
            </div>
            <div class="row justify-content-end mb-60">
                <div class="col">
                    <a href="{{ route('eshop_path') }}" class="float-end a-link">GO TO E-SHOP</a>
                </div>
            </div>
            <div class="row product-items-style4">
                <?php $counter = count((array) $data->components->products->value); ?>
                @foreach ($data->components->products->value as $p)
                    @if ($counter >= 3)
                        <div class="col-sm-6 col-md-4">
                        @else
                            <div class="col-sm-6">
                    @endif
                    @include('partials.product')
            </div>
            @endforeach
            <div class="col-lg-12 text-center pt-60 pb-80">
                <a href="{{ route('eshop_path') }}" class="a-link">GO TO E-SHOP</a>
            </div>
        </div>
        </div>
    </section>
    <!--== End Products Area Wrapper ==-->

    @if (!empty($data->components->other_products->value))
        <!--== Start Category Area Wrapper ==-->
        <section class="blog-area blog-default-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-xl-8 col-xxl-7 mt-50">
                        <div class="section-title stitle-style2 text-center">
                            <h2 class="title title2">{{ $data->components->other_products_title->value }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row category-items-style16">
                    @foreach ($data->components->other_products->value as $op)
                        @include('partials.other-products')
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Category Area Wrapper ==-->
    @endif

    <!--== Start Category Area Wrapper ==-->
    <section class="blog-area blog-default-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7 col-xl-6 col-xxl-6 mt-50">
                    <div class="section-title stitle-style2 text-center mb-10">
                        <h2 class="title title2 mb-10">{{ $data->components->process_title->value }}</h2>
                        <h4>{{ $data->components->process_subtitle->value }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <iframe width="100%" height="768px"
                    src="https://www.youtube.com/embed/{{ $data->components->video->value }}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="row text-center">
                <div class="buttons mt-80">
                    <a href="{{ route('story_path') }}" class="d-inline a-link mr-50">Read our story</a>
                    <a href="{{ route('products_category_path', [26, 'juices']) }}" class="d-inline a-link"> Go to
                        e-shop</a>
                </div>
            </div>
        </div>
    </section>
    <!--== End Category Area Wrapper ==-->
@endsection
