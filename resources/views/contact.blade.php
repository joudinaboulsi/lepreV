@extends('layouts.app')

@section('content')
    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area style-3 bg-img parallax contactH"
        data-bg-img="{{ $data->components->background_picture->lg_img }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 ml-50">
                    <div class="divider-content divider-content-style2 flex-column" data-aos="fade-up"
                        data-aos-duration="1000">
                        <h2 style="font-size:140px">{{ $data->components->title->value }} <span>
                                {{ $data->components->title_2->value }}</span></h2>
                        <h3 class="align-self-start">{{ $data->components->subtitle->value }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Header Area Wrapper ==-->
    <section class="header-area style-1">
        <div class="container-fluid">
            <div class="row pt-30">
                <div class="col-lg-12">
                    <div class="bread-crumbs">
                        <a href="/">Home </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <span class="active"> {{ $data->components->content_subtitle->value }}</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-80 mt-100">
                <div class="col-md-6 col-xl-5 text-center">
                    <h4>{{ $data->components->content_subtitle->value }}</h4>
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area contact">
        <div class="container">
            @foreach ($data->components->locations->value as $l)
                <hr>
                <div class="row mt-50 mb-50" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-auto">
                        <h2><i class="fa fa-map-marker"></i></h2>
                    </div>
                    <div class="col">
                        <h2>{{ $l->components->title->value }}</h2>
                        <h4>{{ $l->components->country->value }}</h4>
                        <div class="street">
                            {!! $l->components->address->value !!}
                        </div>
                        <p class="mt-4">
                            <span>Telephone</span> &nbsp; <a
                                href="tel:{{ $l->components->telephone->value }}">{{ $l->components->telephone->value }}</a>
                        </p>
                        <p>
                            <span>Email</span> <a class="pl-60"
                                href="mailto:{{ $l->components->email->value }}">{{ $l->components->email->value }}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area contact">
        <div class="container">
            <hr>
            <div class="row mt-50 mb-50">
                <div class="col">
                    <h2>Connect <br> with us</h2>
                    <div class="row align-items-center mt-50">
                        <p class="col-auto">
                            @le.pre.lb
                        </p>
                        <div class="col pl-100 info cont">
                            <a href="{{ app('settings')->store_address->fb_link }}" target="_blank"><i
                                    class="lastudioicon lastudioicon-b-facebook"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:30px; color:#99b0bdc7"> | </span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ app('settings')->store_address->insta_link }}" target="_blank">
                                <i class="lastudioicon lastudioicon-b-instagram"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:30px; color:#99b0bdc7"> | </span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ app('settings')->store_address->linkedin_link }}" target="_blank"><i
                                    class="lastudioicon
                                lastudioicon-b-linkedin"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
