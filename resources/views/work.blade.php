@extends('layouts.app')

@section('content')
    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area style-3 bg-img parallax work"
        data-bg-img="{{ $data->components->background_picture->lg_img }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 ml-50">
                    <div class="divider-content divider-content-work  divider-content-style2 flex-column" data-aos="fade-up"
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
            <hr>
            <div class="row justify-content-center text-center mt-50 mb-50">
                <div class="col-md-8 col-lg-6 text-center">
                    <h2>{{ $data->components->careers_title->value }}</h2>
                    {!! $data->components->careers_text->value !!}
                    <div class="contact-form mt-60 mb-50">

                        <form class="contact-form-wrapper form-style" action="{{ route('work_path') }}" id="careersform"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="file" name="cv" required>
                                </div>
                                <div class="col-md-12 mt-30">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-theme" type="submit">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Message Notification -->
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area contact">
        <div class="container">
            <hr>
            <div class="row justify-content-center text-center mt-50 mb-50">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xs-9 col-sm-8">
                    <h2>Connect here</h2>
                    <div class="row justify-content-center text-center mt-50">
                        <p class="col-auto">
                            @le.pre.lb
                        </p>
                        <div class="col pl-100 work-contact">
                            <a href="{{ app('settings')->store_address->fb_link }}" target="_blank"><img
                                    src="{{ url('assets/fb.png') }}" alt="" height="50"></a>
                            &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:30px; color:#99b0bdc7"> | </span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ app('settings')->store_address->insta_link }}" target="_blank"><img
                                    src="{{ url('assets/insta.png') }}" alt="" height="50"></a>
                            &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:30px; color:#99b0bdc7"> | </span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ app('settings')->store_address->linkedin_link }}" target="_blank"><img
                                    src="{{ url('assets/in.png') }}" alt="" height="50"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
