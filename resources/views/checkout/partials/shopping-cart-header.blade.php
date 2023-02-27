<!-- Header -->
<div class="col-lg-12 px-0 pt-2">

    <!-- Logo -->
    <?php $img = app('settings')->logo_lg; ?>
    <a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{ $img }}"
            alt="{{ app('settings')->store_address->store_name }}" width="200" /></a>

    <!-- Back to store link -->
    <a href="{{ route('eshop_path') }}" class="link_colors back_to_store_link">
        < Back to store</a>

</div>

<br>
