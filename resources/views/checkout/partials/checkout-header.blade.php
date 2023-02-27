<!-- Logo -->
<div class="col-lg-12 d-none d-lg-block p-0">
    <?php $img = app('settings')->logo_lg; ?>
	<a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{$img}}" alt="{{ app('settings')->store_address->store_name }}" width="200" /></a><br><br>
</div>

 <?php $url = Request::path(); ?>

<!-- Navigation -->
<div style="font-size: 12px;">
	<a href="{{ route('shopping_cart_path') }}" class="link_colors {{($url == 'shopping-cart')  ? 'non-clickable-link' : '' }}">Cart</a> > 
	<a href="{{route('checkout_info_path')}}" class="link_colors {{($url == 'checkout')  ? 'non-clickable-link' : '' }}">Information</a> > 
	<a @if($checkoutData != null) href="{{ route('checkout_shipping_path') }}" @endif class="link_colors {{($url == 'checkout-shipping')  ? 'non-clickable-link' : '' }}">Shipping</a> > 
	<a @if($checkoutData != null) href="#" @endif class="link_colors non-clickable-link">Payment</a>
</div>