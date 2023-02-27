<?php
    if($oc->seo_url)
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($oc->seo_url));
    else
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($oc->name));
?>
<div class="col-md-6">
    <div class="product-item">
        <div class="product-thumb">
            <a href="{{ route('products_category_path', array($oc->id, $seo_url)) }}">
                <img src="{{ $oc->components->main_image->lg_img }}" alt="{{ $oc->components->title->value }}">
            </a>
        </div>
        <div class="product-info info-style2">
            <div class="content-inner row p-3">                  
                <h4 class="col title"><a href="{{ route('products_category_path', array($oc->id, $seo_url)) }}">{{ $oc->components->title->value }}</a></h4>
                <a href="{{ route('products_category_path', array($oc->id, $seo_url)) }}" class="col">
                    <img src="{{ asset('/img/icons/arrow.png') }}" alt="Button" style="float:right">
                </a>
            </div>
        </div>
    </div>
</div>