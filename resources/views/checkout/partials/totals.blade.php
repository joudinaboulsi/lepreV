<?php
	// If we are in the checkout
	if(isset($checkoutData))
	{
		$discount = $checkoutData->discount_value;
		$tax = ($checkoutData->shipping_address == null) ? "Calculated at checkout" : $checkoutData->taxAmount;
		$shippingFees = $checkoutData->shipping_fees;
		$total = $checkoutData->total;
	}

	// If we are in the shopping cart
	else
	{
		$tax = "Calculated at checkout";
		$total = $cartSubTotal;
	}
?>
<?php 
$currency_code=session('currency_code');
$currency_id=session('currency_id');
$rate=session('currency_rate');
if($currency_id==""){
$currency_code=app('settings')->currency;
$currency_id=app('settings')->currency_id;
$rate=1;
}
?>
<?php 
$language=session('lang');
if($language==""){
$language='ENG';
}
?>
<!-- Subtotals  -->
<div style="font-size: 14px;">
	Subtotal <span class="shopping_cart_subtotals">{{ ($cartSubTotal)*$rate }} <small>{{ $currency_code }}</small></span><br>

	@if(isset($checkoutData) && $discount != 0)
		Discount <span class="shopping_cart_subtotals">{{ $discount }} <small>{{ $currency_code }}</small></span><br>
	@endif

	@if(isset($checkoutData) && $checkoutData->tax != 0)
		Taxes <small>({{ $checkoutData->tax }}%)</small> <span class="shopping_cart_subtotals">{{ $tax }} <small>{{ $currency_code }}</small></span> <br>
	@else
		Taxes <span class="shopping_cart_subtotals">{{ $tax }}</span><br>
	@endif

	@if(isset($checkoutData) && $checkoutData->shipping_fees_title != null)
		Shipping Fees <small>({{$checkoutData->shipping_fees_title}})</small> <span class="shopping_cart_subtotals">{{ $shippingFees }} <small>{{ $currency_code }}</small></span><br>
	@else
		Shipping Fees <span class="shopping_cart_subtotals">Calculated at checkout</span><br>
	@endif
</div>

<hr>

<!-- Total  -->
@if($total_case==1)
<div style="font-size: 18px;">
	Total <span style="float: right;">{{ ($cartSubTotal)*$rate }} <small>{{ $currency_code }}</small></span> <br> 
	<span class="checkout_additional_info"> </span>
</div> 
@elseif($total_case==2)
<div style="font-size: 18px;">
	Total <span style="float: right;">{{ ($cartSubTotal)*$rate +$tax }} <small>{{ $currency_code }}</small></span> <br> 
	<span class="checkout_additional_info"> </span>
</div> 
@else 
<div style="font-size: 18px;">
	Total <span style="float: right;">{{ ($cartSubTotal)*$rate +$tax +$shippingFees}} <small>{{ $currency_code }}</small></span> <br> 
	<span class="checkout_additional_info"> </span>
</div> 
@endif