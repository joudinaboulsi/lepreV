<?php 
$currency_code=session('currency_code');
$currency_id=session('currency_id');
$rate=session('currency_rate');
if($currency_id==""){
$currency_code=app('settings')->currency;
$currency_id=app('settings')->currency_id;
$rate='1';
}
?>

<table class="shopping_cart_table">

	@foreach($cart as $c)
	<tr class="shopping_cart_item_{{$c->options->variant_id}} bg-light py-2">

		<!-- Product image -->
		<td>
			<!-- Image Display-->
            <?php $img = $c->options->img ?>
            <img src="{{ $img }}" class="shopping_cart_img">
        </td>

		<!-- Product description -->
        <td>
			<div class="shopping_cart_product_info">
				<!-- Product Name  -->
				<span class="shopping_cart_product_desc"> 
					 @if($language=='ENG')
                       {{$c->name}}
                        @elseif($language=='AR' && $c->options->product_arabic_title !=null)
                        {{ $c->options->product_arabic_title}}
                        @elseif($language=='FR' && $c->options->product_french_title !=null)
                        {{ $c->options->product_french_title}}
                        @endif (x{{$c->qty}})
				@if($c->options->variant_title != null)
					<small>[{{ $c->options->variant_title }}]</small> 
				@endif
				</span><br>

				<!-- Unit Price  -->
				<span class="shopping_cart_unit_price">Unit: {{$c->price*$rate}} <small>{{ $currency_code }}</small></span>
			</div>
		</td>

		<td>
			<span style="font-size: 13px; display: block; line-height: 1.3;">Total</span>
			<span class="shopping_cart_total_item_price">{{ $c->price * $c->qty*$rate }}</span>
			<small>{{ $currency_code }}</small>
		</td>
	</tr>
	@endforeach
</table>