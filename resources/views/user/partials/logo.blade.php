<!-- Logo -->
<div class="col-lg-12 text-center">
    <br><br>
    <?php $img = app('settings')->logo_lg; ?>
    <a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{ $img }}" alt="{{ app('settings')->store_address->store_name }}" width="200" /></a>
</div>