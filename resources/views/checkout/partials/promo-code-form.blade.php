@if(isset($checkoutData) && $checkoutData->shipping_title !== null)
<form method="POST" action="{{ route('checkout_apply_promo_code') }}">
	@csrf
	<div class="row">
		<div class="col-lg-9 form-group">
			<input type="text" name="promo_code" placeholder="Discount code" class="form-control checkout_select_inputs" required>
		</div>
		
		<div class="col-lg-3 form-group">
			<button class="apply_discount_code">Apply</button>
		</div>

		<div class="col-lg-12 form-group">
			@if($checkoutData->discount_code != null)
				<span class="promo_code">{{$checkoutData->discount_code}} <a href="{{ route('checkout_remove_promo_code', $checkoutData->discount_code) }}" class="text-white">x</a></span>
			@endif

			@include('checkout.partials.flash')
		</div>
	</div>
</form>

<hr>
@endif

