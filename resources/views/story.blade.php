@extends('layouts.app')

@section('content')

<!--== Start Header Area Wrapper ==-->
<section class="header-area style-1">
    <div class="container-fluid">
        <div class="row pt-100">
            <div class="col-lg-12">
                <div class="bread-crumbs">
                    <a href="/">Home </a>
                    <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                    <span class="active"> About us</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-80 mt-100">
            <div class="col-md-6 col-xl-5 col-xxl-4 text-center">
                <h4>{{ $data->components->subtitle->value }}</h4>
                <h2>{{ $data->components->title->value }}</h2>
            </div>
        </div>
    </div>
</section>
<!--== End Header Area Wrapper ==-->

<!--== Start Divider Area Wrapper ==-->
<section class="divider-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5" style="padding-right:50px" data-aos="fade-left" data-aos-duration="1000">
                {!! $data->components->text->value !!}
            </div>
            <div class="col-md-7">
                <img class="img-fluid" src="{{ $data->components->image->lg_img }}" alt="{{ $data->components->title->value }}" data-aos="fade-right" data-aos-duration="1000">
            </div>
        </div>
    </div>
</section>
<!--== End Divider Area Wrapper ==-->

<!--== Start Divider Area Wrapper ==-->
<section class="divider-area mt-120">
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-8 text-center mb-80 mt-50">
                <h2>{{ $data->components->section_title->value }}</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7">
                <img class="img-fluid"  src="{{ $data->components->section_image->lg_img }}" alt="{{ $data->components->section_title->value }}"  data-aos="fade-left" data-aos-duration="1000">
            </div>
            <div class="col-md-5" style="padding-left:50px" data-aos="fade-right" data-aos-duration="1000">
                {!! $data->components->section_text->value !!}
            </div>
        </div>
    </div>
</section>
<!--== End Divider Area Wrapper ==-->

<section class="divider-area mt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center mb-80 mt-50" data-aos="fade-up" data-aos-duration="1000">
                <h2>{{ $data->components->section_2_title->value }}</h2>
            </div>
        </div>
    </div>
</section>

<section class="divider-area bg-img parallax" data-bg-img="{{ $data->components->section_2_image->lg_img }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="divider-content divider-content-style2 flex-column text-center" data-aos="fade-up" data-aos-duration="1000">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!--== Start Divider Area Wrapper ==-->
<section class="divider-area mt-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                {!! $data->components->section_2_text->value !!}
            </div>
        </div>
    </div>
</section>
<!--== End Divider Area Wrapper ==-->

<!--== Start Social Network Area Wrapper ==-->
<div class="container mt-120 mb-60">
    <section class="social-area social-style1-area">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="section-title text-center">
                    <img src="{{ asset('/img/icons/certificates.png') }}" alt="Certificates logo" class="img-fluid">
                    <h2 class="title text-uppercase mt-4">Certificates & Awards</h2>
                </div>
            </div>
        </div>
        <div class="row row-gutter-70 justify-content-center social-items-style1">
            <div class="col-lg-10">
                @foreach($data->components->certificates->value as $c)
                <hr>
                <div class="social-item item-style2">
                    <div class="thumb">
                        <img src="{{ $c->components->logo->lg_img }}" alt="{{ $c->components->title->value }}" />
                    </div>
                    <div class="content">
                        <div class="inner-content">
                            <h4 class="title">{{ $c->components->title->value }}</h4>
                            {!! $c->components->text->value !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<!--== End Social Network Area Wrapper ==-->

@endsection