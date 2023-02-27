<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'home_path',
    'uses' => 'PagesController@home'
]);

Route::post('/', [
    'as' => 'search_path',
    'uses' => 'PagesController@getSearchData'
]);

Route::get('/eshop', [
    'as' => 'eshop_path',
    'uses' => 'PagesController@eshop'
]);

Route::get('/eshop/category-{category_id}-{category_name}', [
    'as' => 'eshop_category_path',
    'uses' => 'PagesController@eshopCategory'
]);

Route::get('/eshop/product-{product_id}-{product_name}', [
    'as' => 'eshop_product_path',
    'uses' => 'PagesController@eshopProduct'
]);

Route::get('/customize', [
    'as' => 'customize_path',
    'uses' => 'PagesController@customize'
]);

Route::get('/our-story', [
    'as' => 'story_path',
    'uses' => 'PagesController@story'
]);

Route::get('/our-products', [
    'as' => 'all_products_path',
    'uses' => 'PagesController@allProducts'
]);

Route::get('/our-products/category-{category_id}-{category_name}', [
    'as' => 'products_category_path',
    'uses' => 'PagesController@productsCategory'
]);

Route::get('/our-products/product-{product_id}-{product_name}', [
    'as' => 'product_details_path',
    'uses' => 'PagesController@productDetails'
]);

Route::get('/latest-news', [
    'as' => 'news_path',
    'uses' => 'PagesController@news'
]);

Route::get('/work-with-us', [
    'as' => 'work_path',
    'uses' => 'PagesController@work'
]);

Route::post('/work-with-us', [
    'as' => 'work_path',
    'uses' => 'PagesController@getCV'
]);

Route::get('/csr', [
    'as' => 'csr_path',
    'uses' => 'PagesController@csr'
]);

Route::get('/contact-us', [
    'as' => 'contact_path',
    'uses' => 'PagesController@contact'
]);

Route::post('/contact-us', [
    'as' => 'contact_path',
    'uses' => 'PagesController@getContactForm'
]);

Route::get('/terms-and-conditions', [
    'as' => 'terms_path',
    'uses' => 'PagesController@terms'
]);

Route::get('/privacy-policy', [
    'as' => 'privacy_path',
    'uses' => 'PagesController@privacy'
]);
//wishlist Page
Route::get('/wishlist', [
    'as' => 'wishlist_path',
    'uses' => 'PagesController@wishlist'
]);


Route::get('add-To-cart','CheckoutController@addToCart');
Route::get('add-To-Wishlist','AuthController@add_To_Wishlist');
Route::get('remove-from-Wishlist','AuthController@remove_from_Wishlist');
Route::get('smart-search','PagesController@smart_search');

/*
|--------------------------------------------------------------------------
| PAYMENTS
|--------------------------------------------------------------------------
*/

Route::post('/twocheckout', 'TwoCheckoutController@payTwoCheckout')->name('two_checkout_path');

Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::post('/paypal', 'PaypalController@payWithpaypal')->name('payWithpaypal');

Route::get('/paypal-success', 'PaypalController@paypalSuccess')->name('paypalSuccess');



/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Sign In Page
Route::get('/sign-in', 'AuthController@signin')->name('sign_in_path');

// Sign Up Page
Route::get('/sign-up', 'AuthController@signup')->name('sign_up_path');

// Forget Password Page
Route::get('/forgot-password', 'AuthController@forgotPassword')->name('forgot_password_path');

// Sign In User AND Synchronizes cart online and Offline if cart Online Exists
Route::post('/login', 'AuthController@login')->name('login_path');

// Sign Up User
Route::post('/register', 'AuthController@register')->name('register_path');

// Reset User password
Route::post('/reset-password', 'AuthController@resetPassword')->name('reset_password_path');

// Logout user
Route::get('/logout', 'AuthController@logout')->name('logout_path');

// My Account
Route::get('/my-account', 'AuthController@myAccount')->name('my_account_path');

/**
* Creates a new address for the user
* @param $request All Address information
* @return Http Response
*/
Route::post('/my-account-add-user-address', 'AuthController@addUserAddress')->name('my_account_add_user_address');

/**
* Creates a new address for the user
* @param $request All Address information
* @return Http Response
*/
Route::get('/my-account-delete-user-address-{address_id}', 'AuthController@deleteUserAddress')->name('my_account_delete_user_address');

/**
* Update actual password
* @param request
* @param - Old Password
* @param - New Password
* @param - Confirm New Password
* @return Http Response
*/
Route::post('/my-account-delete-user-address', 'AuthController@updatePassword')->name('my_account_update_user_password');



/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

/**
* STEP 1 - Displays the Shopping cart
*
* @return Http Response
*/
Route::get('/shopping-cart', 'CheckoutController@shoppingCart')->name('shopping_cart_path');

Route::get('/country/provinces', 'CheckoutController@getProvinces');
Route::post('currency_load','CheckoutController@currencyLoad')->name('currency.load');
Route::post('language_load','CheckoutController@change_language')->name('language.load');

/**
* STEP 2 - Displays the Checkout information
*
* @return Http Response
*/
Route::get('/checkout/', 'CheckoutController@checkoutInfo')->name('checkout_info_path');

/**
* STEP 3 - Display Shipping rates in checkout
* @return Http Response
*/
Route::get('/checkout-shipping', 'CheckoutController@checkoutShipping')->name('checkout_shipping_path');

/**
* STEP 4 - Display Payment methods for checkout
* @return Http Response
*/
Route::get('/payment', 'CheckoutController@payment')->name('checkout_payment_path');


/**
* STEP 5 - Proceed to payment
* @return Http Response
*/
Route::post('/payment', 'CheckoutController@cashOnDelivery')->name('checkout_cash_on_delivery');


/*
|--------------------------------------------------------------------------
| AREEBA
|--------------------------------------------------------------------------
*/

Route::post('/areeba-payment', 'AreebaController@areebaPayment')->name('areeba_payment');

/**
* Thank you page from areeba payment
* @return Http Response
*/
Route::get('/thank-you-areeba-payment-{bank_order_id}', 'AreebaController@thankYou')->name('checkout_thank_you_areeba');

/**
* Add item to Cart.
*
* @param $request->variant_id   Variant that we are adding to cart
* @param $request->qty  Qty of the variant we are adding to cart
*
* @return $data  Array containing:
* - the item that we want to add to cart (variant_id)
* - the item quantity in the cart
* - the total number of items in the cart
* - the cart subtotal
* - the validity of the item we are adding to cart
*/
// Route::post('/add-to-cart', 'CheckoutController@addToCart')->name('add_to_cart_path');
Route::post('/add-to-cart', 'CheckoutController@addToCart');


/**
* Edit Cart Quantity.
*
* @param $request->variant_id   Variant that we are adding to cart
* @param $request->qty  Qty of the variant we are adding to cart
*
* @return $data  Array containing:
* - the item that we want to add to cart (variant_id)
* - the total number of items in the cart
* - the cart subtotal
*/
Route::post('/edit-cart-qty', 'CheckoutController@editCartQty')->name('edit_cart_qty_path');

/**
* Remove Item Qty from Cart.
*
* @param $request->variant_id   Variant that we are adding to cart
* @param $request->qty  Qty of the variant we are adding to cart
*
* @return $data  Array containing:
* - the item that we want to add to cart (variant_id)
* - the total number of items in the cart
* - the cart subtotal
*/
Route::post('/remove-qty-from-cart', 'CheckoutController@removeCartQty')->name('remove_cart_qty_path');


/**
* Get Data Address Information of a specific address
*
* @param $address_id
* @return Address
*/
Route::post('/checkout-user-addresses', 'CheckoutController@showCheckoutAddress')->name('show_checkout_user_addresses_path');


/**
* Update the checkout information of the user
* @param $request  Full Address of the user with his email and subscription to newsletters
* @return Http Response
*/
Route::post('/update-checkout-info', 'CheckoutController@updateCheckoutInfo')->name('update_checkout_info');

/**
* Update the shipping address of the user
* @param $request  Full Shipping Address
* @return Http Response
*/
Route::post('/update-shipping-address', 'CheckoutController@updateShippingAddress')->name('update_shipping_address');

/**
* Update the billing address of the user
* @param $request  Full Shipping Address
* @return Http Response
*/
Route::post('/update-billing-address', 'CheckoutController@updateBillingAddress')->name('update_billing_address');

/**
* Update the shipping rate of the user's checkout order
* @param $userId   ID of the user that is doing the order.
* @param rate_name   Name of the rate selected by the user.
* @param rate_value   Value of the rate selected by the user.
* @return Http Response
*/
Route::post('/update-shipping-rate', 'CheckoutController@updateShippingRate')->name('update_shipping_rate');

/**
* Apply promo code to the checkout of the user
* @param promo_code  Promo code that we are applying to the checkout
* @return Http Response
*/
Route::post('/apply-promo-code', 'CheckoutController@applyPromoCode')->name('checkout_apply_promo_code');

/**
* Remove promo code from checkout
* @param promoCode  Promo code Id that we are applying to the checkout
* @return Http Response
*/
Route::get('/remove-promo-code/{promoCode}', 'CheckoutController@removePromoCode')->name('checkout_remove_promo_code');



/**
* Generate dynamic sitemap
*/
Route::get('/sitemap', function() {

    // create new sitemap object
    $sitemap = App::make('sitemap');

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 60);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached()) {
        // add item to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), '2021-02-02T20:10:00+02:00', '1.0', 'daily');
        $sitemap->add(URL::to('about'), '2021-02-02T12:30:00+02:00', '0.9', 'monthly');
        $sitemap->add(URL::to('products'), '2021-02-02T12:30:00+02:00', '0.9', 'monthly');
        $sitemap->add(URL::to('find-our-products'), '2021-02-02T12:30:00+02:00', '0.9', 'monthly');
        $sitemap->add(URL::to('contact'), '2021-02-02T12:30:00+02:00', '0.9', 'monthly');
        $sitemap->add(URL::to('sign-in'), '2021-02-02T12:30:00+02:00', '0.5', 'monthly');
        $sitemap->add(URL::to('sign-up'), '2021-02-02T12:30:00+02:00', '0.5', 'monthly');
        $sitemap->add(URL::to('forgot-password'), '2021-02-02T12:30:00+02:00', '0.5', 'monthly');
        $sitemap->add(URL::to('logout'), '2021-02-02T12:30:00+02:00', '0.5', 'monthly');
        $sitemap->add(URL::to('my-account'), '2021-02-02T12:30:00+02:00', '0.5', 'monthly');
        $sitemap->add(URL::to('shopping-cart'), '2021-02-02T12:30:00+02:00', '0.7', 'monthly');
        $sitemap->add(URL::to('checkout'), '2021-02-02T12:30:00+02:00', '0.6', 'monthly');
        $sitemap->add(URL::to('checkout-shipping'), '2021-02-02T12:30:00+02:00', '0.6', 'monthly');
        $sitemap->add(URL::to('payment'), '2021-02-02T12:30:00+02:00', '0.6', 'monthly');
        $sitemap->add(URL::to('paypal-success'), '2021-02-02T12:30:00+02:00', '0.6', 'monthly');

        // get all products from db
        $products = DB::table('products')->where('is_hidden', 0)->orderBy('created_at', 'desc')->get();

        // add every product to the sitemap
        foreach ($products as $product) {
            $sitemap->add(URL::to('products/'.$product->id.'-'.$product->seo_url), $product->updated_at, '0.8', 'daily');
        }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
});


/*
|--------------------------------------------------------------------------
| BOX-CUSTOMIZE
|--------------------------------------------------------------------------
*/


  
Route::get('customize/create-step-one', 'BoxController@index')->name('customize.step-one');

Route::get('customize/create-step-two', 'BoxController@second')->name('customize.step-two');

Route::get('customize/create-step-three', 'BoxController@third')->name('customize.create.step-three');

Route::get('customize/create-step-faur', 'BoxController@faurth')->name('customize.create.step-faur');