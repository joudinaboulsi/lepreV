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
                    <span class="active"> Latest News</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-80">
            <div class="col-md-6 col-xl-5 col-xxl-4 text-center">
                <h4>{{ $data->components->subtitle->value }}</h4>
            </div>
        </div>
    </div>
</section>
<!--== End Header Area Wrapper ==-->

<!--== Start Blog Area Wrapper ==-->
<section class="divider-area latest-news mt-60">
    <div class="container">
        @foreach($data->components->news->value as $n)
        <div class="row align-self-stretch mb-50 mt-50" data-aos="fade-up" data-aos-duration="1000">
            <!--== Start Blog Post Item ==-->
            <div class="col-md-6">
                <a href="{{ $n->components->link->value }}" target="_blank">
                    <img src="{{ $n->components->image->lg_img }}" alt="{{ $n->components->title->value }}">
                </a>
            </div>
            <div class="col-md-6" style="padding-left:50px">
                <div class="row h-100">
                    <div class="col-12 align-self-baseline content">
                        <div class="post-meta">
                            <p> <i class="fa fa-calendar"></i> {{ $n->components->date->value }} @if($n->components->author->value) - {{ $n->components->author->value }} @endif</p>
                        </div>
                        <div class="inner-content">
                            <h4 class="title">{{ $n->components->title->value }}</h4>
                            {!! $n->components->text->value !!}
                        </div>
                    </div>
                    <div class="col-12 align-self-end">
                        <a href="{{ $n->components->link->value }}" target="_blank"><i class="fa fa-plus"></i> Read more</a> &nbsp;
                        <a href="{{ $n->components->link->value }}" target="_blank"><i class="fa fa-share"></i> Share</a>
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_email"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_linkedin"></a>
                        </div>
                        <script>
                        var a2a_config = a2a_config || {};
                        a2a_config.onclick = 1;
                        </script>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
            </div>
            <!--== End Blog Post Item ==-->
        </div>
        <hr>
        @endforeach
    </div>
</section>
<!--== End Blog Area Wrapper ==-->

<!--== Start Category Area Wrapper ==-->
<section class="divider-area style-2 mt-120">
    <div class="container-fluid">
        <div class="row justify-content-center mb-40">
            <div class="col-md-6 col-xl-5 text-center">
                <h2>{{ $data->components->title->value }}</h2>
            </div>
        </div>
        <div class="row category-items-style16">
            @foreach($data->components->product_categories->value as $pc)
                @include('partials.vinegars')
            @endforeach
        </div>
    </div>
</section>
<!--== End Category Area Wrapper ==-->

@endsection