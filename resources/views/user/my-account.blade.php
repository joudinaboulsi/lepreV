<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        {!! SEOMeta::generate() !!}

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

        <link rel="stylesheet" href="/css/checkout/checkout.css" id="main-styles-link">

        <!-- intlTelInput CSS -->
        <link href="/css/checkout/plugins/intlTelInput/intlTelInput.css" rel="stylesheet">

        <link href="/css/myaccount/all.css" rel="stylesheet"> <!--load all styles -->

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo app('settings')->fb_pixel; ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{ app('settings')->fb_pixel }}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ app('settings')->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo app('settings')->google_analytics; ?>');
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>

    <body class="bg-light">

        <div class="container-fluid">
            <div class="row">
                <!-- Logo -->
                <div class="col-lg-12 bg-white p-4">
                    <?php $img = app('settings')->logo_lg; ?>
                    <a href="{{ route('home_path') }}"><img class="brand-logo-dark " src="{{ $img }}" alt="{{ app('settings')->store_address->store_name }}" width="200" /></a>
                </div>

                <div class="col-lg-12 px-3 py-4 pb-1">
                    <h3 class="ml-2"><a href="{{ route('home_path') }}" class="text-dark"><u>Home</u></a> / My Account</h3>
                    @include('user.partials.flash')
                </div>

                <div class="col-lg-12 py-4">
                    <!-- Contact information -->
                    <div class="row">
                        <div class="col-lg-4 px-4">
                            <div class="bg-white p-3">

                                <div class="col-lg-12 pt-3"> 
                                    <span><b>ACCOUNT DETAILS</b></span> <br>
                                    {{ session()->get('user')->firstname }} {{ session()->get('user')->lastname }} <br>
                                    {{ session()->get('user')->email }}
                                    <hr>

                                    <span><b>ADDRESSES</b></span> <br>
                                    @if($addresses !== null)
                                        @foreach($addresses as $a)
                                            <b>{{ $a->title }} <small>({{ $a->firstname }} {{ $a->lastname }})</small></b> <br>
                                            {{ $a->fullAddress }} | {{ $a->phone }} <br>
                                            <a href="{{ route('my_account_delete_user_address', $a->id ) }}"><small>Delete</small></a><br><br>
                                        @endforeach
                                    @endif
                                    <hr>

                                    <h5>
                                        <a href="#" data-toggle="modal" data-target="#addShippingAddress"> Add new address </a> <i class="float-right text-primary fas fa-home"></i>
                                        <hr>
                                        <a href="" data-toggle="modal" data-target="#editPassword">Edit Password</a><i class="float-right text-primary fas fa-edit"></i>
                                        <hr>
                                        <a href="{{ route('logout_path') }}"> Logout </a> <i class="float-right text-primary fas fa-sign-out-alt"></i>
                                    </h5>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 px-4">
                            <div class="bg-white p-3">

                                <div class="col-lg-12 pt-3">
                                    <table class="w-100">
                                        <thead class="border-bottom">
                                            <th>ORDER</th>
                                            <th class="d-none d-sm-table-cell">DATE</th>
                                            <th class="d-none d-sm-table-cell">PAYMENT STATUS</th>
                                            <th class="d-none d-sm-table-cell">DELIVERY STATUS</th>
                                            <th>TOTAL</th>
                                            <th></th>
                                        </thead>
                                        @if($orders !== null)
                                            @foreach($orders as $order)
                                            <tr class="border-bottom">
                                                <td>
                                                    @if($order->status_id == 3)
                                                        <s><a href="" data-toggle="modal" data-target="#orderDetails_{{$order->id}}">#{{ $order->code }}</a></s>
                                                    @else
                                                        <a href="" data-toggle="modal" data-target="#orderDetails_{{$order->id}}">#{{ $order->code }}</a>
                                                    @endif
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <?php 
                                                    $date = new DateTime($order->updated_at);
                                                    echo $date->format('M d, Y');
                                                    ?>
                                                </td>
                                                <td  class="d-none d-sm-table-cell">
                                                    @if($order->status_id == 1)
                                                        Open
                                                    @elseif($order->status_id == 2)
                                                        Archived
                                                    @elseif($order->status_id == 3)
                                                        Canceled
                                                    @elseif($order->payment_status_id == 1)
                                                        Paid
                                                    @elseif($order->payment_status_id == 2)
                                                        Partially Refunded
                                                    @elseif($order->payment_status_id == 3)
                                                        Partially Paid
                                                    @elseif($order->payment_status_id == 4)
                                                        Pending
                                                    @elseif($order->payment_status_id == 5)
                                                        Refunded
                                                    @elseif($order->payment_status_id == 6)
                                                        Unpaid
                                                    @elseif($order->payment_status_id == 7)
                                                        Voided
                                                    @endif
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    @if($order->fulfillment_status_id == 1)
                                                        Fulfilled
                                                    @elseif($order->fulfillment_status_id == 2)
                                                        Unfulfilled
                                                    @elseif($order->fulfillment_status_id == 3)
                                                        Partially fulfilled
                                                    @endif
                                                </td>
                                                <td>{{$order->total}} <small>{{ app('settings')->currency }}</small> for {{count($order->items)}} items</td>
                                                <td>
                                                    <button class="float-right m-2 p-2 btn btn-secondary" data-toggle="modal" data-target="#orderDetails_{{$order->id}}">View</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </table> 
                                    <br>
                                    <a href="{{ route('shop_path') }}"><button class="m-2 p-2 btn btn-primary">Continue shopping</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: Orders Details -->
        @if($orders !== null)
            @foreach($orders as $o)
            <div class="modal fade " id="orderDetails_{{$o->id}}"  tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Order #{{$o->code}} (
                                <?php 
                                    $date = new DateTime($o->updated_at);
                                    echo $date->format('M d, Y');
                                ?>)
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <table class="w-100">
                                        <tr>
                                            <td>
                                                <b>Shipping Address: </b><br>
                                                {{ $o->fullShippingAddress }}
                                            </td>
                                            <td>
                                                <b>Billing Address: </b> <br>
                                                {{ $o->fullBillingAddress }}<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Payment status</b> <br>
                                                @if($o->status_id == 1)
                                                    Open
                                                @elseif($o->status_id == 2)
                                                    Archived
                                                @elseif($o->status_id == 3)
                                                    Canceled
                                                @elseif($o->payment_status_id == 1)
                                                    Paid
                                                @elseif($o->payment_status_id == 2)
                                                    Partially Refunded
                                                @elseif($o->payment_status_id == 3)
                                                    Partially Paid
                                                @elseif($o->payment_status_id == 4)
                                                    Pending
                                                @elseif($o->payment_status_id == 5)
                                                    Refunded
                                                @elseif($o->payment_status_id == 6)
                                                    Unpaid
                                                @elseif($o->payment_status_id == 7)
                                                    Voided
                                                @endif
                                            </td>
                                            <td>
                                                <b>Fulfillment status</b><br>
                                                @if($o->fulfillment_status_id == 1)
                                                    Fulfilled
                                                @elseif($o->fulfillment_status_id == 2)
                                                    Unfulfilled
                                                @elseif($o->fulfillment_status_id == 3)
                                                    Partially fulfilled
                                                @endif
                                            </td>
                                        </tr>      
                                    </table>

                                </div>
                            </div>

                            <br>

                            <div class="row">        
                                <div class="col-lg-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($o->items as $orderItem)
                                            <tr>
                                                <td>{{$orderItem->product_title}} 
                                                    @if($orderItem->variant_title !== null)
                                                    [{{$orderItem->variant_title}}]
                                                    @endif
                                                </td>
                                                <td>{{$orderItem->price}} <small>{{ app('settings')->currency }}</small></td>
                                                <td>{{$orderItem->quantity}}</td>
                                                <td>{{$orderItem->quantity * $orderItem->price}} <small>{{ app('settings')->currency }}</small></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>Subtotal</td>
                                                <td colspan="3">{{ $o->itemsTotalPrice }} <small>{{ app('settings')->currency }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                <td colspan="3">{{ $o->discount_value }} <small> {{ app('settings')->currency }} @if($o->discount_code != null) ({{ $o->discount_code }})  @endif</small></td>
                                            </tr>
                                            <tr>
                                                <td>Tax</td>
                                                <td colspan="3">{{ $o->taxAmount }} <small>{{ app('settings')->currency }}</small></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Fees</td>
                                                <td colspan="3">{{ $o->shipping_fees }} <small>{{ app('settings')->currency }}</small></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td colspan="3">{{ $o->total }} <small>{{ app('settings')->currency }}</small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              
                    </div>
                </div>
            </div>
            @endforeach
        @endif


        <!-- MODAL: Add new Address -->
        <div class="modal fade" id="addShippingAddress" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('my_account_add_user_address') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- Title -->
                                <div class="col-lg-12">
                                    <label>Title</label>
                                    <input
                                        type="text"
                                        name="title"
                                        maxlength="{{ app('settings')->environment->address_firstname_max_char }}"
                                        placeholder="Title"
                                        class="form-control form-group checkout_inputs"
                                        value="{{ old('title') }}"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="row">
                                <!-- Firstname -->
                                <div class="col-lg-6">
                                    <label>Firstname</label>
                                    <input
                                        type="text"
                                        name="firstname"
                                        maxlength="{{ app('settings')->environment->address_firstname_max_char }}"
                                        placeholder="First name"
                                        class="form-control form-group checkout_inputs"
                                        value="{{ old('firstname') }}"
                                        required
                                    />
                                </div>
                                <div class="col-lg-6">
                                    <!-- Lastname -->
                                    <label>Lastname</label>
                                    <input
                                        type="text"
                                        name="lastname"
                                        maxlength="{{ app('settings')->environment->address_lastname_max_char }}"
                                        placeholder="Last name"
                                        class="form-control form-group checkout_inputs"
                                        value="{{ old('lastname') }}"
                                        required
                                    />
                                </div>
                            </div>

                            @if(app('settings')->environment->address_has_apartment == 1)
                            <div class="row">
                                <!-- Apartment -->
                                <div class="col-lg-12">
                                    <label>Apartment</label>
                                    <input
                                        class="form-control form-group checkout_inputs"
                                        type="text"
                                        name="apartment"
                                        maxlength="{{ app('settings')->environment->address_apartment_max_char }}"
                                        placeholder="Apartment, suite, etc. (Optional)"
                                        value="{{ old('apartment') }}"
                                    />
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <!-- Address -->
                                <div class="col-lg-12">
                                    <label>Address</label>
                                    <input class="form-control form-group checkout_inputs" type="text" name="address" maxlength="{{ app('settings')->environment->address_max_char }}" placeholder="Address" value="{{ old('address')  }}" required />
                                </div>
                            </div>

                            <div class="row">
                                <!-- City -->
                                <div class="col-lg-6">
                                    <label>City</label>
                                    <input class="form-control form-group checkout_inputs" type="text" name="city" maxlength="{{ app('settings')->environment->address_city_max_char }}" placeholder="City" value="{{ old('city')  }}" required />
                                </div>

                                <!-- Country -->
                                <div class="col-lg-6">
                                    <label>Country</label>
                                    <select name="country_id" class="form-control form-group checkout_select_inputs select_address" required>
                                        <option value="0">Select Country</option>
                                        @foreach($countries as $c)
                                        <option id="country_{{$c->id}}" value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                @if(app('settings')->environment->address_has_postal_code == 1)
                                <!-- Postal Code -->
                                <div class="col-lg-6">
                                    <label>Postal Code</label>
                                    <input
                                        class="form-control form-group checkout_inputs"
                                        type="text"
                                        name="postal_code"
                                        maxlength="{{ app('settings')->environment->address_postal_code_max_char }}"
                                        placeholder="Postal Code"
                                        value="{{ old('postal_code')  }}"
                                    />
                                </div>
                                @endif

                                <!-- Phone -->
                                <div class="col-lg-6">
                                    <label>Phone</label>
                                    <div id="phone_container">
                                        <input
                                            type="tel"
                                            class="inputText form-control required show-error-msg checkout_select_inputs"
                                            value="{{ old('phone') }}"
                                            id="phone"
                                            minlength="{{ app('settings')->environment->user_phone_min_char }}"
                                            maxlength="{{ app('settings')->environment->user_phone_max_char }}"
                                            required
                                        />
                                        <input type="hidden" name="phone" value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL: Edit Password -->
        <div class="modal fade" id="editPassword" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('my_account_update_user_password') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- Password -->
                                <div class="col-lg-12">
                                    <label>Old Password</label>
                                    <input type="password" name="old_password" maxlength="" placeholder="Old password" class="form-control form-group checkout_inputs" value="{{ old('old_password') }}" required />
                                </div>

                                <!-- New Password -->
                                <div class="col-lg-12">
                                    <label>New password</label>
                                    <input type="password" name="new_password" maxlength="" placeholder="New password" class="form-control form-group checkout_inputs" value="{{ old('new_password') }}" required />
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-lg-12">
                                    <label>Confirm New Password </label>
                                    <input type="password" name="confirm_password" maxlength="" placeholder="Confirm password" class="form-control form-group checkout_inputs" value="{{ old('confirm_password') }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="/js/checkout/plugins/intlTelInput/intlTelInput.js"></script>

        <script type="text/javascript">
            /*
                 ----- function that activate the phone flag input and fill the relative hidden input------ 
                 Input:
                - #phone_container: an id attribute that is a parent container div of the phone input
                - #phone_name: an id attribute for the input of type tel
                --
                */
            function phoneCountry(phone_container, phone_name) {
                var phone = $("#" + phone_container); //
                let telInput = phone.find("input[type=tel]");

                var input = document.querySelector("#" + phone_name);
                // initialize
                window.intlTelInput(input, {
                    initialCountry: "lb",
                    preferredCountries: ["lb"],
                    autoPlaceholder: "aggressive",
                    separateDialCode: true,
                });

                // Empty the phone value when I click on a country code
                //  (so we will not copy the wrong country code in the hidden input in case the user changed the country code AFTER filling the phone input)
                $("#" + phone_container + " .iti__country").on("click", function () {
                    phone.find("input[type=tel]").val(""); // empty the phone value
                    phone.find("input[type=hidden]").val(""); // empty the hidden value
                });

                // when writing any value in the phone input
                telInput.on("keyup", function () {
                    var phone_nbr = phone.find("input[type=tel]").val(); // get the phone number
                    var country_code = phone.find(".iti__selected-dial-code").html(); // get the country code

                    if (phone_nbr == "") phone.find("input[type=hidden]").val("");
                    else phone.find("input[type=hidden]").val(country_code + phone_nbr); //concatenate country_code + phone_nbr and set them into the phone_hidden
                });
            }

            phoneCountry("phone_container", "phone");

            $(document).ready(function () {
                $("#phone").css("padding-left", "92px");
            });
        </script>

    </body>
</html>