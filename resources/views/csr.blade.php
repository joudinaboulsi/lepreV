@extends('layouts.app')

@section('content')
    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area style-3 bg-img parallax csrH"
        data-bg-img="{{ $data->components->background_picture->lg_img }}" loading="auto|eager|lazy">
        <div class="container-fluid">
            <div class="row">
                <div class="csr col-md-7 ml-50">
                    <div class="divider-content divider-content-style2 flex-column" data-aos="fade-up"
                        data-aos-duration="1000">
                        <h2>{{ $data->components->title->value }} <span> {{ $data->components->title_2->value }}</span></h2>
                        <h3 class="align-self-start">{{ $data->components->subtitle->value }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Header Area Wrapper ==-->
    <section class="header-area style-1 csrHeader">
        <div class="container-fluid">
            <div class="row pt-30">
                <div class="col-lg-12">
                    <div class="bread-crumbs">
                        <a href="/">Home </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <span class="active"> CSR</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-80 mt-100">
                <div class="col-md-6 col-xl-5 text-center">
                    <h4>{{ $data->components->content_subtitle->value }}</h4>
                    <h2>{{ $data->components->content_title->value }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area content-csr">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 csrPOne" style="padding-right:50px" data-aos="fade-left" data-aos-duration="1000">
                    {!! $data->components->text_1->value !!}
                </div>
                <div class="col-md-7">
                    <img class="img-fluid" src="{{ $data->components->image_1->lg_img }}"
                        alt="{{ $data->components->text_1->value }}" data-aos="fade-right" data-aos-duration="1000">
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area csrP mt-120">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7" data-aos="fade-left" data-aos-duration="1000">
                    <img class="img-fluid" src="{{ $data->components->image_2->lg_img }}"
                        alt="{{ $data->components->text_2->value }}">
                </div>
                <div class="col-md-5" style="padding-left:50px" data-aos="fade-right" data-aos-duration="1000">
                    {!! $data->components->text_2->value !!}
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area csrP mt-120 mb-120">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5" style="padding-right:50px" data-aos="fade-left" data-aos-duration="1000">
                    <div class="lead">{!! $data->components->text_3->value !!}</div>
                </div>
                <div class="col-md-7">
                    <img class="img-fluid" src="{{ $data->components->image_3->lg_img }}"
                        alt="{{ $data->components->text_3->value }}" data-aos="fade-right" data-aos-duration="1000">
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->
@endsection
