<?php
    if($p->seo_url)
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($p->seo_url));
    else
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($p->name));
?>
<!-- Start Product Item -->
<div class="product-item">
    <div class="product-thumb">
        <a href="{{ route('product_details_path', array($p->id, $seo_url)) }}">
            <img src="{{ $p->components->image->lg_img }}" alt="{{ $p->components->title->value }}">
        </a>
    </div>
    <div class="product-info info-style2">
        <div class="content-inner">                  
            <h4 class="title"><a href="{{ route('product_details_path', array($p->id, $seo_url)) }}">{{ $p->components->title->value }}</a></h4>
            <p>{{ $p->components->subtitle->value }}</p>
            <a href="{{ route('product_details_path', array($p->id, $seo_url)) }}" class="more-btn">Read more</a>
        </div>
    </div>
</div>
<!-- End Product Item -->