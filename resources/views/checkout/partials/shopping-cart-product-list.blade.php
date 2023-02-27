<table class="shopping_cart_table">

	@foreach($cart as $c)
        <tr class="shopping_cart_item_{{$c->options->variant_id}} bg-light py-2">
		<!-- Product image -->
		<td>
			<!-- Image Display-->
            <img src="{{ $c->options->img }}" class="shopping_cart_img" onerror="imgError(this);">
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
                        @endif

					
				@if($c->options->variant_title != null)
					<small>[{{ $c->options->variant_title }}]</small>
				@endif
				</span><br>

				<!-- Unit Price  -->
				<span class="shopping_cart_unit_price">Unit: {{$c->price *$rate }} <small>{{$currency_code}}</small></span>

				<!-- Remove Link  -->
				<a href="#" onclick="updateCartQty({{ $c->options->variant_id }}, 0)" class="link_colors shopping_cart_remove_link">Remove</a>
			</div>
		</td>

		<!-- Product Qty -->
		<td>
			<small>Qty</small>
			<input type="number" value="{{$c->qty}}" class="shopping_cart_item_qty form-control" data-variant="{{ $c->options->variant_id }}">
		</td>

		<td>
			<small>Total</small>
		<span class="shopping_cart_total_item_price">{{ $c->price * $c->qty * $rate }}</span>
			<small>{{$currency_code}}</small>
		</td>
	</tr>
	@endforeach
</table>
<script>
    function imgError(image)
    {
        image.onerror = "";
        image.src = "{{ asset("images/error/no-image.jpg") }}";
        return true;
    }
</script>
