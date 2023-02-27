<?php
    if($pc->seo_url)
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($pc->seo_url));
    else
        $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($pc->name));
?>
<div class="col">
    <div class="category-item">
        <div class="thumb">
            <a href="{{ route('products_category_path', array($pc->id, $seo_url)) }}">
                <img src="{{ $pc->components->main_image->lg_img }}" alt="{{ $pc->components->title->value }}">
            </a>
            <a class="category-banner-link" href="{{ route('products_category_path', array($pc->id, $seo_url)) }}"></a>
        </div>
        <div class="content">
            <h4 class="title">{{ $pc->components->title->value }}</h4>
        </div>
    </div>
</div>