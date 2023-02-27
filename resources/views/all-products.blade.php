@extends('layouts.app')

@section('content')
    <!--== Start Header Area Wrapper ==-->
    <section class="header-area style-1  allPro">
        <div class="container-fluid">
            <div class="row pt-100">
                <div class="col-lg-12">
                    <div class="bread-crumbs">
                        <a href="/">Home </a>
                        <span class="breadcrumb-sep"> &nbsp; > &nbsp; </span>
                        <span class="active"> Our Products</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Header Area Wrapper ==-->

    <!--== Start Category Area Wrapper ==-->
    <section class="divider-area style-2 mt-40">
        <div class="container-fluid">
            <div class="row category-items-style16 allProduct-style-6">
                <div class="col">
                    <div class="category-item allProduct-item">
                        <div class="thumb">
                            <a href="{{ route('product_details_path', [29, 'apple-juice']) }}">
                                <img src="{{ asset('/img/juices.png') }}" alt="Juices">
                            </a>
                            <a class="category-banner-link"
                                href="{{ route('product_details_path', [29, 'apple-juice']) }}"></a>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                Juices
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item allProduct-item">
                        <div class="thumb">
                            <a href="{{ route('product_details_path', [52, 'orange-juice']) }}">
                                <img src="{{ asset('/img/vinegars.png') }}" alt="Vinegars">
                            </a>
                            <a class="category-banner-link"
                                href="{{ route('product_details_path', [52, 'orange-juice']) }}"></a>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                Vinegars
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Category Area Wrapper ==-->
@endsection
