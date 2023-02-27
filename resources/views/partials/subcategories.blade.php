<section class="category-area category-style6-area pt-0">
    <div class="container-fluid p-0">
        <div class="row row-gutter-0 category-items-style10">

            @foreach ($data->components->subcategories->value as $jc)
                <?php
                
                if ($jc->seo_url) {
                    $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($jc->seo_url));
                } else {
                    $seo_url = preg_replace('/[^a-z0-9]/', '-', strtolower($jc->name));
                }
                ?>
                <div class="col m-0 p-0">
                    <div class="category-item">
                        <div class="thumb">
                            <a href="{{ route('product_details_path', [$jc->id, $seo_url]) }}">
                                <img src="{{ $jc->components->main_image->lg_img }}"
                                    alt="{{ $jc->components->title->value }}">
                            </a>
                            <a class="category-banner-link"
                                href="{{ route('product_details_path', [$jc->id, $seo_url]) }}"></a>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                <img src="{{ $jc->components->icon->lg_img }}"
                                    alt="{{ $jc->components->title->value }}"> &nbsp;
                                {{ $jc->components->title->value }}
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
