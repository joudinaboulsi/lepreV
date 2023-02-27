<?php
    if($op->seo_url)
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($op->seo_url));
    else
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($op->name));
?>
<div class="col">
    <div class="category-item">
        <div class="thumb">
            <a href="{{ route('product_details_path', array($op->id, $seo_url)) }}">
                <img src="{{ $op->components->other_image->lg_img }}" alt="{{ $op->components->title->value }}">
            </a>
            <a class="category-banner-link" href="{{ route('product_details_path', array($op->id, $seo_url)) }}"></a>
        </div>
        <div class="content">
            <h4 class="title">{{ $op->components->title->value }}</h4>
        </div>
    </div>
</div>