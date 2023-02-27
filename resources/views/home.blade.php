@extends('layouts.app')

@section('content')
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area slider-home3">
        <div class="home-slider-content">
            <div class="swiper-container home-slider3-container">
                <div class="swiper-wrapper">
                    @foreach ($data->components->slideshow->value as $s)
                        <div class="swiper-slide">
                            <!-- Start Slide Item -->
                            <div class="home-slider-item">
                                <div class="bg-thumb bg-img" data-bg-img="{{ $s->components->image->lg_img }}"></div>
                                <div class="slider-content-area">
                                    <div class="content">
                                        <div class="inner-content">
                                            <h4>{{ $s->components->subtitle->value }}</h4>
                                            <h2>{{ $s->components->title->value }}</h2>
                                            <!-- <a href="{{ $s->components->link->value }}" class="btn-theme btn-black">Shop Now</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Slide Item -->
                        </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    @if (isset($data->components->video->value))
        <iframe width="100%" height="768px" src="https://www.youtube.com/embed/{{ $data->components->video->value }}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    @endif

    <!--== Start Category Area Wrapper ==-->
    <section class="category-area category-style4-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7 col-xxl-6">
                    <div class="section-title stitle-style2 separator-line-top text-center">
                        <h2 class="title">{{ $data->components->title->value }}</h2>
                        <p class="lead mt-100">{{ $data->components->text->value }}</p>
                        <div class="buttons mt-50">
                            <a href="{{ route('story_path') }}" class="d-inline mr-50"><img
                                    src="{{ asset('/img/icons/arrow.png') }}" alt="Button"> &nbsp; Read our story</a>
                            <a href="{{ route('products_category_path', [26, 'juices']) }}" class="d-inline"><img
                                    src="{{ asset('/img/icons/arrow.png') }}" alt="Button"> &nbsp; See our products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Category Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area bg-img parallax mission"
        data-bg-img="{{ $data->components->background_picture->lg_img }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="divider-content divider-content-style1" data-aos="fade-up" data-aos-duration="1000">
                        <h3>{{ $data->components->mission_title->value }}</h3>
                        <p>{!! $data->components->mission_text->value !!}</p>
                        <br><br>
                        <h3>{{ $data->components->vision_title->value }}</h3>
                        <p>{!! $data->components->vision_text->value !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Category Area Wrapper ==-->
    <section class="category-area category-style4-area mt-120 mb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7 col-xxl-6">
                    <div class="section-title stitle-style2 text-center">
                        <img src="{{ asset('/img/icons/quotes.png') }}" alt="Quotes" width="110">
                        <br>
                        <h4 class="title titl  mt-50 mb-50" style="font-size:35px; letter-spacing:0.1rem">
                            {{ $data->components->manifesto->value }}</h4>
                        <a href="{{ route('story_path') }}" class="btn btn-theme btn-border btn-rounded">Read our
                            Manifesto</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Category Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area bg-img mb-30" data-bg-img="{{ $data->components->juices_background->lg_img }}">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="divider-content divider-content-style2 flex-column" data-aos="fade-up"
                        data-aos-duration="1000">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-white text-uppercase">
                                    {{ $data->components->juices_title->value }}</h1>
                            </div>
                        </div>
                        <div class="row w-100 features">
                            <div class="col text-center">
                                <h4 class="text-uppercase text-white"><i class="fa fa-check" style="font-weight:300"></i>
                                    {{ $data->components->juices_feature_1->value }}</h4>
                            </div>
                            <div class="col text-center">
                                <h4 class="text-uppercase text-white"><i class="fa fa-check" style="font-weight:300"></i>
                                    {{ $data->components->juices_feature_2->value }}</h4>
                            </div>
                            <div class="col text-center">
                                <h4 class="text-uppercase text-white"><i class="fa fa-check" style="font-weight:300"></i>
                                    {{ $data->components->juices_feature_3->value }}</h4>
                            </div>
                        </div>
                        <div class="buttons mt-80">
                            <a href="{{ route('products_category_path', [26, 'juices']) }}"
                                class="d-inline text-white mr-50"><img src="{{ asset('/img/icons/arrow-white.png') }}"
                                    alt="Button"> &nbsp; See all juices</a>
                            <a href="{{ route('products_category_path', [26, 'juices']) }}"
                                class="d-inline text-white"><img src="{{ asset('/img/icons/arrow-white.png') }}"
                                    alt="Button"> &nbsp; See our products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Category Area Wrapper ==-->
    @include('partials.subcategories')
    <!--== End Category Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="category-area category-style6-area pt-160">
        <div class="text-center">
            <h1 class="text-uppercase">{{ $data->components->vinegars_title->value }}</h1>
        </div>
    </section>
    <section class="divider-area bg-img parallax" data-bg-img="{{ $data->components->vinegars_background->lg_img }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="divider-content divider-content-style2 flex-column text-center" data-aos="fade-up"
                        data-aos-duration="1000">
                        <p class="text-white mb-60" style="font-size: 26px; line-height: 40px;">{!! $data->components->vinegars_text->value !!}
                        </p>
                        <a href="{{ route('products_category_path', [28, 'vinegars']) }}" class="text-white mr-50"><img
                                src="{{ asset('/img/icons/arrow-white.png') }}" alt="Button"> &nbsp; See all
                            vinegars</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-default-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xl-8 col-xxl-7 mt-50">
                    <div class="section-title stitle-style2 separator-line-top text-center">
                        <h2 class="title title2">{{ $data->components->locations_title->value }}</h2>
                        <p class="lead">{{ $data->components->locations_text->value }}</p>
                    </div>
                </div>
            </div>
            <div class="row post-items" data-aos="fade-up" data-aos-duration="1200">
                <div class="col-12">
                    <div class="swiper-container post-slider-container">
                        <div class="swiper-wrapper">
                            @foreach ($data->components->locations->value as $location)
                                <div class="swiper-slide">
                                    <!--== Start Blog Post Item ==-->
                                    <div class="post-item">
                                        <div class="thumb">
                                            <img src="{{ $location->components->image->lg_img }}"
                                                alt="{{ $data->components->title->value }}" />
                                        </div>
                                    </div>
                                    <!--== End Blog Post Item ==-->
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
@endsection
