@extends('checkout.layout.checkout-layout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php
    $currency_code = session('currency_code');
    $currency_id = session('currency_id');
    $rate = session('currency_rate');
    if ($currency_id == '') {
        $currency_code = app('settings')->currency;
        $currency_id = app('settings')->currency_id;
        $rate = '1';
    }
    ?>
    <?php
    $language = session('lang');
    if ($language == '') {
        $language = 'ENG';
    }
    ?>
    <!-- CHECKOUT FORM -->
    <div class="col-lg-7 bg-white">
        <div class="row p-5">
            <div class="col-lg-3"></div>

            <div class="col-lg-8 p-4 pb-0">
                @include('checkout.partials.checkout-header')

                <br>

                @include('checkout.partials.errors')
                <div class="shipping_info_table">
                    <div>
                        <table width="100%">
                            <tr class="border-bottom">
                                <td class="shipping_info_table_title">Contact</td>
                                <td class="py-2" style="width:70%;">{{ $checkoutData->user_email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="shipping_info_table_title">Ship to</td>
                                <td class="shipping_info_table_content">
                                    {{ $checkoutData->shipping_firstname }} {{ $checkoutData->shipping_lastname }}<br>
                                    {{ $checkoutData->shipping_apartment }},
                                    {{ $checkoutData->shipping_address }},
                                    {{ $checkoutData->shipping_postal_code }},
                                    {{ $checkoutData->shipping_city }},
                                    {{ $checkoutData->shipping_country }}<br>
                                    {{ $checkoutData->shipping_phone }}
                                </td>
                                <td class="shipping_info_table_change_action">
                                    <a href="" data-toggle="modal" data-target="#shippingAddress">Change</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="shipping_info_table_title">Bill to</td>
                                <td class="shipping_info_table_content">
                                    {{ $checkoutData->billing_firstname }} {{ $checkoutData->billing_lastname }}<br>
                                    {{ $checkoutData->billing_apartment }},
                                    {{ $checkoutData->billing_address }},
                                    {{ $checkoutData->billing_postal_code }},
                                    {{ $checkoutData->billing_city }},
                                    {{ $checkoutData->billing_country }}<br>
                                    {{ $checkoutData->billing_phone }}
                                </td>
                                <td class="shipping_info_table_change_action">
                                    <a href="" data-toggle="modal" data-target="#billingAddress">Change</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <br>

                <form method="POST" action="{{ route('update_shipping_rate') }}">
                    @csrf
                    <!-- Shipping rates -->
                    <div>
                        Shipping method <br><br>

                        <input type='hidden' value='<?php echo $currency_id; ?>' name="currency_id">
                        <input type='hidden' value='<?php echo $rate; ?>' name="currency_rate">
                        <div class="border px-2 py-1">
                            <div>
                                @if ($shippingRates->tag_freeshipping != 'not available')
                                    <input type="hidden" name="shipping_rate" class="mr-2"
                                        value="{{ $shippingRates->tag_freeshipping->id }}">
                                    <input type="hidden" name="free" class="mr-2" value="1">
                                    <p>
                                        @if ($language == 'ENG')
                                            {!! $shippingRates->tag_freeshipping->message !!}
                                        @elseif($language == 'AR')
                                            {!! $shippingRates->tag_freeshipping->arabic->message !!}
                                        @elseif($language == 'FR')
                                            {!! $shippingRates->tag_freeshipping->french->message !!}

                                        @endif



                                    </p>
                                @else
                                    <table width="100%">
                                        <input type="hidden" name="free" class="mr-2" value="0">
                                        <?php $counter = 0; ?>
                                        @if ($shippingRates != null)
                                            @foreach ($shippingRates->listShippingRate as $rates)
                                                <tr @if ($counter != 0) class="border-top" @endif>
                                                    <td class="py-2" style="width:80%;">
                                                        <input type="radio" name="shipping_rate" class="mr-2"
                                                            value="{{ $rates->id }}"
                                                            @if ($counter == 0) checked @endif><label>

                                                            @if ($language == 'ENG')
                                                                {{ $rates->shipping_rate_name }}({{ $rates->description }})
                                                            @elseif($language == 'AR')
                                                                {{ $rates->arabic->name }}({{ $rates->arabic->description }})
                                                            @elseif($language == 'FR')
                                                                {{ $rates->french->name }}({{ $rates->french->description }})
                                                            @endif
                                                        </label>
                                                    </td>
                                                    <td class="shipping_rate_value">
                                                        {{ $rates->price * $rate }}<small>{{ $currency_code }}</small></td>
                                                </tr>
                                                <?php $counter++; ?>
                                            @endforeach
                                        @else
                                            No shipping available.
                                        @endif
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        Special instructions <br><br>
                        <textarea class="w-100 form-control checkout_inputs notes" name="notes"></textarea>
                    </div>

                    <br>

                    <!-- Return to Cart or Continue to shipping -->
                    <div>
                        <br>

                        <a href="{{ route('checkout_info_path') }}" class="link_colors">
                            < Return to information</a>
                                @if ($shippingRates != null)<button
                                        class="continue_to_shipping ladda-button" id="form-submit"
                                        data-style="expand-left">Continue to payment</button>@endif
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- MODAL: Edit Shipping Address -->
    <div class="modal fade " id="shippingAddress" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update_shipping_address') }}" id="shippingaddressform">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <!-- Firstname -->
                            <div class="col-lg-6 form-group">
                                <label>Firstname</label>
                                <input type="text" name="firstname"
                                    maxlength="{{ app('settings')->environment->address_firstname_max_char }}"
                                    placeholder="First name" class="form-control checkout_inputs"
                                    value="{{ old('firstname', $checkoutData->shipping_firstname) }}" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <!-- Lastname -->
                                <label>Lastname</label>
                                <input type="text" name="lastname"
                                    maxlength="{{ app('settings')->environment->address_lastname_max_char }}"
                                    placeholder="Last name" class="form-control checkout_inputs"
                                    value="{{ old('lastname', $checkoutData->shipping_lastname) }}" required>
                            </div>

                            @if (app('settings')->checkout->address_has_apartment == 1)
                                <!-- Apartment -->
                                <div class="col-lg-12 form-group">
                                    <label>Apartment</label>
                                    <input class="form-control checkout_inputs" type="text" name="apartment"
                                        maxlength="{{ app('settings')->environment->address_apartment_max_char }}"
                                        placeholder="Apartment, suite, etc. (Optional)"
                                        value="{{ old('city', $checkoutData->shipping_apartment) }}">
                                </div>
                            @endif

                            <!-- Address -->
                            <div class="col-lg-6 form-group">
                                <label>Address</label>
                                <input class="form-control checkout_inputs" type="text" name="address"
                                    maxlength="{{ app('settings')->environment->address_max_char }}"
                                    placeholder="Address" value="{{ old('address', $checkoutData->shipping_address) }}"
                                    required>
                            </div>
                            <!-- City -->
                            <div class="col-lg-6 form-group">
                                <label>City</label>
                                <input class="form-control checkout_inputs" type="text" name="city"
                                    maxlength="{{ app('settings')->environment->address_city_max_char }}"
                                    placeholder="City" value="{{ old('city', $checkoutData->shipping_city) }}" required>
                            </div>

                            @if (app('settings')->checkout->address_has_postal_code == 1)
                                <!-- Postal Code -->
                                <div class="col-lg-12 form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control checkout_inputs" type="text" name="postal_code"
                                        maxlength="{{ app('settings')->environment->address_postal_code_max_char }}"
                                        placeholder="Postal Code"
                                        value="{{ old('postal_code', $checkoutData->shipping_postal_code) }}">
                                </div>
                            @endif

                            <!-- Country -->
                            <div class="col-lg-6 form-group">
                                <label>Country</label>

                                <select name="country_id"
                                    class="form-control checkout_select_inputs select_address required"
                                    onchange="country_selected(this,1,'{{ $checkoutData->shipping_province }}')" required>
                                    <option value="0" selected disabled>Select Country</option>

                                    @foreach (app('settings')->CountriesSelected as $c)
                                        <option id="country_{{ $c->id }}" value="{{ $c->id }}"
                                            @if ($checkoutData !== null) @if ($checkoutData->shipping_country_id == $c->id) selected @endif
                                            @endif
                                            >{{ $c->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>province</label>
                                <span id="province_shipping">
                                    @if ($checkoutData->shipping_province_id == 'no_id')
                                        <input type="text" name="province" placeholder="province"
                                            class="form-control checkout_inputs"
                                            value="{{ $checkoutData->shipping_province }}" required>

                                        <input type="hidden" name="province_id" class="form-control " value="no_id">
                                    @else
                                        <select name="province_id"
                                            class="form-control checkout_select_inputs select_address required" required>
                                            <option value="0" selected disabled>Select province</option>
                                            @foreach (app('settings')->provinces as $p)
                                                <option id="province_id" value="{{ $p->id }}"
                                                    @if ($checkoutData !== null) @if ($checkoutData->shipping_province_id == $p->id) selected @endif
                                                    @endif
                                                    >{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </span>
                            </div>

                            <!-- Phone -->
                            <div class="col-lg-6 form-group">
                                <label>Phone</label>
                                <div id="phone_container">
                                    <input type="tel"
                                        class="inputText form-control required show-error-msg checkout_select_inputs"
                                        value="{{ old('phone', $checkoutData->shipping_phone) }}" id="phone"
                                        minlength="{{ app('settings')->environment->user_phone_min_char }}"
                                        maxlength="{{ app('settings')->environment->user_phone_max_char }}" required>
                                    <input type="hidden" name="phone"
                                        value="{{ old('phone', $checkoutData->shipping_phone) }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn continue_to_shipping">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL: Edit Billing Address -->
    <div class="modal fade " id="billingAddress" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Billing Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('update_billing_address') }}" id="billingaddressform">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <!-- Firstname -->
                            <div class="col-lg-6 form-group">
                                <label>Firstname</label>
                                <input type="text" name="firstname"
                                    maxlength="{{ app('settings')->environment->address_firstname_max_char }}"
                                    placeholder="First name" class="form-control checkout_inputs"
                                    value="{{ old('firstname', $checkoutData->billing_firstname) }}" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <!-- Lastname -->
                                <label>Lastname</label>
                                <input type="text" name="lastname"
                                    maxlength="{{ app('settings')->environment->address_lastname_max_char }}"
                                    placeholder="Last name" class="form-control checkout_inputs"
                                    value="{{ old('lastname', $checkoutData->billing_lastname) }}" required>
                            </div>

                            @if (app('settings')->checkout->address_has_apartment == 1)
                                <!-- Apartment -->
                                <div class="col-lg-12 form-group">
                                    <label>Apartment</label>
                                    <input class="form-control checkout_inputs" type="text" name="apartment"
                                        maxlength="{{ app('settings')->environment->address_apartment_max_char }}"
                                        placeholder="Apartment, suite, etc. (Optional)"
                                        value="{{ old('city', $checkoutData->billing_apartment) }}">
                                </div>
                            @endif

                            <!-- Address -->
                            <div class="col-lg-6 form-group">
                                <label>Address</label>
                                <input class="form-control checkout_inputs" type="text" name="address"
                                    maxlength="{{ app('settings')->environment->address_max_char }}"
                                    placeholder="Address" value="{{ old('address', $checkoutData->billing_address) }}"
                                    required>
                            </div>
                            <!-- City -->
                            <div class="col-lg-6 form-group">
                                <label>City</label>
                                <input class="form-control checkout_inputs" type="text" name="city"
                                    maxlength="{{ app('settings')->environment->address_city_max_char }}"
                                    placeholder="City" value="{{ old('city', $checkoutData->billing_city) }}" required>
                            </div>

                            @if (app('settings')->checkout->address_has_postal_code == 1)
                                <!-- Postal Code -->
                                <div class="col-lg-12 form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control checkout_inputs" type="text" name="postal_code"
                                        maxlength="{{ app('settings')->environment->address_postal_code_max_char }}"
                                        placeholder="Postal Code"
                                        value="{{ old('postal_code', $checkoutData->billing_postal_code) }}">
                                </div>
                            @endif

                            <!-- Country -->
                            <div class="col-lg-6 form-group">
                                <label>Country</label>

                                <select name="country_id"
                                    class="form-control checkout_select_inputs select_address required"
                                    onchange="country_selected(this,2,'{{ $checkoutData->billing_province }}')" required>
                                    <option value="0" selected disabled>Select Country</option>

                                    @foreach (app('settings')->CountriesSelected as $c)
                                        <option id="country_{{ $c->id }}" value="{{ $c->id }}"
                                            @if ($checkoutData !== null) @if ($checkoutData->billing_country_id == $c->id) selected @endif
                                            @endif
                                            >{{ $c->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>province</label>
                                <span id="province_billing">
                                    @if ($checkoutData->billing_province_id == 'no_id')
                                        <input type="text" name="province" placeholder="province"
                                            class="form-control checkout_inputs"
                                            value="{{ $checkoutData->billing_province }}" required>

                                        <input type="hidden" name="province_id" class="form-control " value="no_id">
                                    @else
                                        <select name="province_id"
                                            class="form-control checkout_select_inputs select_address required" required>
                                            <option value="0" selected disabled>Select province</option>
                                            @foreach (app('settings')->provinces as $p)
                                                <option id="{{ $p->id }}" value="{{ $p->id }}"
                                                    @if ($checkoutData !== null) @if ($checkoutData->billing_province_id == $p->id) selected @endif
                                                    @endif
                                                    >{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </span>
                            </div>

                            <!-- Phone -->
                            <div class="col-lg-6 form-group">
                                <label>Phone</label>
                                <div id="phone_container2">
                                    <input type="tel"
                                        class="inputText form-control required show-error-msg checkout_select_inputs"
                                        value="{{ old('phone', $checkoutData->billing_phone) }}" id="phone2"
                                        minlength="{{ app('settings')->environment->user_phone_min_char }}"
                                        maxlength="{{ app('settings')->environment->user_phone_max_char }}" required>
                                    <input type="hidden" name="phone"
                                        value="{{ old('phone', $checkoutData->billing_phone) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn continue_to_shipping">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="/js/checkout/ladda/spin.min.js"></script>
    <script src="/js/checkout/ladda/ladda.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $("#shippingaddressform").validate({
            ignore: null
        });
        $("#billingaddressform").validate({
            ignore: null
        });
        $('#form-submit').on('click', function() {
            var form = $(this).closest('form')[0];
            if (form.checkValidity() == true) {
                var l = Ladda.create(document.querySelector('#form-submit'));
                l.start();
                form.submit();
            }
        });


        function country_selected(select, id, name) {
            $name = name;
            $.ajax({
                url: "/country/provinces",
                type: "GET",
                data: {
                    'data': select.options[select.selectedIndex].value,
                    'province_name': $name
                },
                success: function(data) {
                    if (id == 1) {
                        $("#province_shipping").html(data);
                    } else {
                        $("#province_billing").html(data);
                    }



                }
            })
        }
    </script>

@stop
