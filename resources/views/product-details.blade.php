@extends('layouts.app')

@section('content')
    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area product-header bg-img" data-bg-img="{{ $data->components->background_picture->lg_img }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-3 col-md-6 col-xs-1">
                    <div class="divider-content divider-content-style2 flex-column align-items-start contentH"
                        data-aos="fade-up" data-aos-duration="1000">
                        <p class="mb-15"><img class="imgProduct" src="{{ $data->components->benefit_1_icon->lg_img }}"
                                alt="benefit icon" width="65"> &nbsp; {{ $data->components->benefit_1_title->value }}
                        </p>
                        <p class="mb-15"><img class="imgProduct" src="{{ $data->components->benefit_2_icon->lg_img }}"
                                alt="benefit icon" width="65"> &nbsp; {{ $data->components->benefit_2_title->value }}
                        </p>
                        <p class="mb-15"><img class="imgProduct" src="{{ $data->components->benefit_3_icon->lg_img }}"
                                alt="benefit icon" width="65"> &nbsp; {{ $data->components->benefit_3_title->value }}
                        </p>
                        <div class="buttons prod-details">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#basicModal"
                                class="d-inline text-white mr-50"><img src="{{ asset('/img/icons/arrow-white.png') }}"
                                    alt="Button"> &nbsp; Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-2 col-md-5 col-xs-1">
                    <div class="divider-content divider-content-style2 flex-column align-items-start mt-90"
                        data-aos="fade-up" data-aos-duration="1000">
                        <div class="d-flex sizeprod">
                            <h4>Available in</h4>
                            <p class="mb-10 size sone">250ml</p>
                            <p class="mb-50 size stwo">750ml</p>
                        </div>
                        <a href="#"
                            class="btn btnp btn-theme btn-theme-color2 btn-rounded text-uppercase mt-120"><b>Shop
                                here</b></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    @if ($data->components->cocktail_title->value)
                        <div class="divider-content divider-content-style2 align-items-start mt-120" data-aos="fade-up"
                            data-aos-duration="1000">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#basicModal2" class="btn-cocktail"
                                style="background-color:{{ $data->components->color->value }}">
                                <img src="{{ asset('/img/icons/cocktail.png') }}" alt="Cocktail Pairing" width="50"
                                    class="mb-2"><br>
                                Cocktail pairing
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" style="margin-left:12%; margin-top:0">
            <div class="modal-content product-modal"
                style="background-color:{{ $data->components->color->value }}; border-radius:0">
                <div class="modal-body">
                    <button type="button" class="close no-border float-end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br><br><br>
                    <p class="mt-30">{!! $data->components->details->value !!}</p>
                    <hr>
                    <h2>Ingredients</h2>
                    {!! $data->components->ingredients->value !!}
                    <hr>
                    <h2>Nutritional Facts</h2>
                    {!! $data->components->nutritional_facts->value !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="margin-right:12%;">
            <div class="modal-content product-modal"
                style="background-color:{{ $data->components->color->value }}; border-radius:0">
                <div class="modal-body">
                    <button type="button" class="close no-border float-end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br><br>
                    <p><img src="{{ asset('/img/icons/cocktail.png') }}" alt="Cocktail Pairing" class="mb-2"> &nbsp;
                        Cocktail Pairing</p>
                    <h2>{{ $data->components->cocktail_title->value }}</h2>
                    <div class="d-flex text-center text-uppercase">
                        <p>{{ $data->components->cocktail_time->value }}</p> &nbsp; | &nbsp;
                        <p>{{ $data->components->cocktail_ingredients->value }} ingredients</p> &nbsp; | &nbsp;
                        <p>{{ $data->components->calories->value }} calories</p>
                    </div>
                    <hr>
                    {!! $data->components->cocktail_desc->value !!}
                    <hr>
                    <p>{{ $data->components->cocktail_footer->value }}</p>
                </div>
            </div>
        </div>
    </div>

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
                        <span class="active"> {{ $data->components->linked_title->value }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($data->components->linked_products->value))
        <section class="header-area style-4 bg-light">
            <div class="container-fluid">
                <div class="row justify-content-center pb-80 pt-100">
                    <div class="col-md-6 col-xl-5 col-xxl-4 text-center">
                        <h4>{{ $data->components->linked_subtitle->value }}</h4>
                        <h2>{{ $data->components->linked_title->value }}</h2>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col">
                        <a href="{{ route('eshop_path') }}" class="float-end a-link">GO TO E-SHOP</a>
                    </div>
                </div>
                <div class="row row-gutter-60 product-items-style4">
                    @foreach ($data->components->linked_products->value as $p)
                        <div class="col-sm-6 col-md-4">
                            @include('partials.product')
                        </div>
                    @endforeach
                    <div class="col-lg-12 text-center pt-60 pb-80">
                        <a href="{{ route('eshop_path') }}" class="a-link">GO TO E-SHOP</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (!empty($data->components->other_varieties->value))
        <!--== Start Category Area Wrapper ==-->
        <section class="blog-area blog-default-area bg-light">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-xl-8 col-xxl-7 mt-50">
                        <div class="section-title stitle-style2 text-center">
                            <h2 class="title title2">{{ $data->components->other_varieties_title->value }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row category-items-style10">
                    @foreach ($data->components->other_varieties->value as $oc)
                        @include('partials.product')
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Category Area Wrapper ==-->
        <div class="col-lg-12 text-center pt-60 pb-80">
            <a href="{{ route('eshop_path') }}" class="a-link">GO TO E-SHOP</a>
        </div>
    @endif

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

    <!--== Start Header Area Wrapper ==-->
    <section class="divider-area">
        <div class="container">
            <div class="row justify-content-center mb-80 mt-100">
                <div class="col-md-6 col-xl-5 text-center">
                    <h4 class="subtitle">{{ $data->components->recipes_subtitle->value }}</h4>
                    <h2>{{ $data->components->recipes_title->value }}</h2>
                    <p>{{ $data->components->recipes_text->value }}</p>
                </div>
            </div>

            <div class="accordian-content">
                <div class="accordion" id="accordionExample2">
                    @foreach ($data->components->recipes->value as $r)
                        <div class="accordion-item">
                            <hr>
                            <div class="row justify-content-center align-items-center mb-50 mt-50 accordion-header"
                                id="heading-{{ $r->id }}">
                                <div class="col-md-4">
                                    <img src="{{ $r->components->image->lg_img }}"
                                        alt="{{ $r->components->title->value }}" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h4 class="title">{{ $r->components->title->value }}</h4>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $r->id }}" aria-expanded="false"
                                        aria-controls="collapse-{{ $r->id }}"><img
                                            src="{{ asset('/img/icons/arrow.png') }}" alt="Button"></button>
                                </div>
                            </div>
                            <div id="collapse-{{ $r->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $r->id }}" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    {!! $r->components->text->value !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->

    <!--== Start Header Area Wrapper ==-->
    <section class="divider-area">
        <div class="container">
            <div class="row justify-content-center mb-80 mt-100">
                <div class="col-md-10 col-lg-8 text-center">
                    <h4 class="subtitle">{{ $data->components->details_subtitle->value }}</h4>
                    <h2 class="mb-30">{{ $data->components->details_title->value }}</h2>
                    {!! $data->components->details_text->value !!}
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->
@endsection
