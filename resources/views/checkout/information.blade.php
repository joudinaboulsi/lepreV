@extends('checkout.layout.checkout-layout')

@section('content')

    <?php
    $language = session('lang');
    if ($language == '') {
        $language = 'ENG';
    }
    ?>


    <?php
    $lng = session('lng');
    $lat = session('lat');
    $title = session('title');
    $firstname = session('firstname');
    $lastname = session('lastname');
    $shippingAddress = session('shippingAddress');
    $apartment = session('apartment');
    $city = session('city');
    $postal_code = session('postal_code');
    $phone = session('phone');
    $country_id = session('country_id');
    $province = session('province');
    $province_id = session('province_id');
    if ($lng == '') {
        $lat = 33.88863;
        $lng = 35.49548;
    }
    ?>


    <!-- CHECKOUT FORM -->
    <div class="col-lg-7 bg-white">
        <div class="row p-5">
            <div class="col-lg-3"></div>

            <div class="col-lg-9 p-4 pb-0">
                @include('checkout.partials.checkout-header')

                <br>

                <form method="POST" action="{{ route('update_checkout_info') }}" id="checkoutform">
                    @csrf
                    <!-- Contact information -->
                    @if (session()->get('user') !== null)
                        <input type="hidden" name="user_id" value="{{ session()->get('user')->id }}">
                    @endif
                    <div>
                        Contact information

                        <!-- If the user is a GUEST we suggest to sign in -->
                        @if (session()->get('user') === null)
                            <span class="float-right" style="font-size:13px;">
                                Already have an account?
                                <a href="{{ route('sign_in_path') }}" class="link_colors" style="font-size:13px;">Log in</a>
                            </span>
                        @endif
                        <br><br>


                        <input type="email" name="email" placeholder="Email or mobile phone number"
                            maxlength="{{ app('settings')->environment->user_email_max_char }}"
                            class="form-control checkout_inputs"
                            @if ($checkoutData === null) value="{{ old('email', $userEmail) }}"
                    @else
                        value="{{ old('email', $checkoutData->user_email) }}" @endif>
                        <input type="checkbox" name="newletters" id="newletters" checked> <label style="font-size: 13px;"
                            for="newletters">Keep me up to date on news and exclusive offers</label>
                    </div>

                    <br>

                    <!-- Shipping Address -->
                    <div class="row">
                        <div class="col-lg-12">
                            Shipping address
                        </div>
                    </div>

                    <br>
                    <!-- Select Box Addresses -->
                    @if (session()->get('user') !== null)
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <select name="select_title" class="form-control checkout_select_inputs select_address"
                                    id="select_address" required>
                                    <option value="0">New Address</option>

                                    <!-- If the user is signed in we display his addresses -->
                                    @if (session()->get('user') !== null)
                                        @foreach ($userAddresses as $address)
                                            <option value="{{ $address->id }}"
                                                @if (session()->get('selected_address') == $address->id) selected @endif>{{ $address->title }}
                                            </option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>

                        <!-- Address Title -->
                        <div class="row address_title">
                            <div class="col-lg-12 form-group">
                                <input type="text" name="title"
                                    maxlength="{{ app('settings')->environment->address_title_max_char }}"
                                    placeholder="Title (i.e. Home, Work, Office)." class="form-control checkout_inputs"
                                    @if ($checkoutData !== null) value="{{ old('title', $title) }}"
                        @else 
                            value="{{ old('title') }}" @endif>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <!-- Firstname -->
                        <div class="col-lg-6 form-group">
                            <input type="text" name="firstname"
                                maxlength="{{ app('settings')->environment->address_firstname_max_char }}"
                                placeholder="First name" class="form-control checkout_inputs"
                                @if ($checkoutData !== null) value="{{ old('firstname', $firstname) }}"
                        @else 
                            value="{{ old('firstname') }}" @endif
                                required>
                        </div>

                        <!-- Lastname -->
                        <div class="col-lg-6 form-group">
                            <input type="text" name="lastname"
                                maxlength="{{ app('settings')->environment->address_lastname_max_char }}"
                                placeholder="Last name" class="form-control checkout_inputs"
                                @if ($checkoutData !== null) value="{{ old('lastname', $lastname) }}"
                        @else 
                            value="{{ old('lastname') }}" @endif
                                required>
                        </div>

                        <!-- Address -->
                        <div class="col-lg-12 form-group">
                            <input type="text" name="address"
                                maxlength="{{ app('settings')->environment->address_max_char }}" placeholder="Address"
                                class="form-control checkout_inputs"
                                @if ($checkoutData !== null) value="{{ old('address', $shippingAddress) }}"
                        @else 
                            value="{{ old('address') }}" @endif
                                required>
                        </div>

                        @if (app('settings')->checkout->address_has_apartment == 1)
                            <!-- Apartment -->
                            <div class="col-lg-12 form-group">
                                <input type="text" name="apartment"
                                    maxlength="{{ app('settings')->environment->address_apartment_max_char }}"
                                    placeholder="Apartment, suite, etc. (Optional)" class="form-control checkout_inputs"
                                    @if ($checkoutData !== null) value="{{ old('apartment', $apartment) }}"
                        @else 
                            value="{{ old('apartment') }}" @endif>
                            </div>

                        @endif


                        <!-- Country -->
                        <div class="col-lg-6 form-group">
                            <select name="country_id" class="form-control checkout_select_inputs select_address required"
                                onchange="country_selected(this)" required>
                                <option value="0" selected disabled>Select Country</option>

                                @foreach (app('settings')->CountriesSelected as $c)
                                    <option id="country_{{ $c->id }}" value="{{ $c->id }}"
                                        @if ($checkoutData !== null) @if ($country_id == $c->id) selected @endif
                                        @endif
                                        >{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Country -->
                        <div class="col-lg-6 form-group" id='province'>
                            @if ($province == null)
                                <select name="province_id"
                                    class="form-control checkout_select_inputs select_address required" required>
                                    <option value="0" selected disabled>Select province</option>
                                    @foreach (app('settings')->provinces as $p)
                                        <option id="{{ $p->id }}" value="{{ $p->id }}">{{ $p->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" name="province_id" placeholder="province"
                                    class="form-control checkout_inputs" value="{{ $province }}" required
                                    disabled><input type="hidden" value="{{ $province_id }}" name="province_id" />
                            @endif
                        </div>

                        <!-- City -->
                        <div class="col-lg-6 form-group">
                            <input type="text" name="city"
                                maxlength="{{ app('settings')->environment->address_city_max_char }}" placeholder="City"
                                class="form-control checkout_inputs"
                                @if ($checkoutData !== null) value="{{ old('city', $city) }}" 
                        @else 
                            value="{{ old('city') }}" @endif
                                required>
                        </div>

                        @if (app('settings')->checkout->address_has_postal_code == 1)
                            <!-- Postal Code -->
                            <div class="col-lg-6 form-group">
                                <input type="text" name="postal_code"
                                    maxlength="{{ app('settings')->environment->address_postal_code_max_char }}"
                                    placeholder="Postal Code" class="form-control checkout_inputs"
                                    @if ($checkoutData !== null) value="{{ old('postal_code', $postal_code) }}" 
                        @else 
                            value="{{ old('postal_code') }}" @endif
                                    required>
                            </div>
                        @endif

                        <!-- Phone -->
                        <div class="col-sm-6 user-input-wrp form-group" id="phone_container">
                            <input type="tel" class="inputText form-control checkout_inputs required show-error-msg"
                                @if ($checkoutData !== null) value="{{ old('phone', $phone) }}"
                        @else 
                            value="{{ old('phone') }}" @endif
                                id="phone" minlength="{{ app('settings')->environment->user_phone_min_char }}"
                                maxlength="{{ app('settings')->environment->user_phone_max_char }}" required>

                            <input type="hidden" name="phone"
                                @if ($checkoutData !== null) value="{{ old('phone', $phone) }}"
                        @else 
                            value="{{ old('phone') }}" @endif>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div id="map" style="height:400px; width:520px;" class="my-3">
                                <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHl8MfyA2dvQDELl3O1wZISl3ez7ZTNhw&callback=initMap"
                                    type="text/javascript"></script>
                            </div>
                            <input type="hidden" name="long" value="{{ $lng }}" id="long" />
                            <input name="lat" type="hidden" value="{{ $lat }}" id="lat" />
                        </div>
                    </div>

                    <!-- Return to Cart or Continue to shipping -->
                    <div>
                        <br>
                        <a href="{{ route('shopping_cart_path') }}" class="link_colors" style=" font-size:13px;">
                            < Return to cart</a>
                                <button type="submit" id="form-submit" class="continue_to_shipping ladda-button"
                                    data-style="expand-left"><span class="ladda-label">Continue to
                                        shipping</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/checkout/ladda/spin.min.js"></script>
    <script src="/js/checkout/ladda/ladda.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $("#checkoutform").validate();
    </script>
    <script type="text/javascript">
        $('#form-submit').on('click', function() {
            var form = $(this).closest('form')[0];
            if (form.checkValidity() == true) {
                var l = Ladda.create(document.querySelector('#form-submit'));
                l.start();
                form.submit();
            }
        });

        function country_selected(select) {
            $name = "";
            $.ajax({
                url: "/country/provinces",
                type: "GET",
                data: {
                    'data': select.options[select.selectedIndex].value,
                    'province_name': $name
                },
                success: function(data) {
                    // alert(data);
                    $("#province").html(data);

                }
            })
        }
    </script>

    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: {{ $lat }},
                    lng: {{ $lng }}
                },
                zoom: 8,
                scrollwheel: true,
            });
            // let lt=$('#lat').val()
            // let long=$('#long').val()
            const uluru = {
                lat: {{ $lat }},
                lng: {{ $lng }}
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    document.getElementById("lat").value = lat;
                    document.getElementById("long").value = lng;
                })
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>


@stop
