<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class CheckoutController extends Controller
{
    public function __construct()
    {   

        // get all the currency global variable and bind it  in a container 
        app()->singleton('settings', function(){ return  generalSettingsApi(); });
         // dd(app('settings'));

        // get all the currency global variable and bind it  in a container 
        app()->singleton('notification', function(){ return  confirmNotificationApi(); });
      
        // Create a Guest session for the user
        if(session()->get('guest') === null) 
            session()->put('guest', hexdec( uniqid() ));
    }

    public function totalCart(){
        $cartSubTotal =0;
        foreach(Cart::Content() as $item){
        $cartSubTotal= $cartSubTotal+($item->price*$item->qty);
        }
        return $cartSubTotal;
    }

    public function getProvinces(Request $request){
     
      $provinces=provinces($request->input('data'));
      $size=count($provinces) ;
      $output="";

     $output1 ='<select name="province_id" class="form-control checkout_select_inputs select_address required" required>
         <option value="0" selected disabled>Select province</option>';
      if($size>0){
        foreach($provinces as $p){
       $output1 .= '<option value="'.$p->id.'">'.$p->name.'</option>' ;
      }
      $output1 .='</select>';
      $output=$output1;
      }
      else {
        $output.= ' <input type="text" name="province" placeholder="province" class="form-control checkout_inputs" value="'.$request->input('province_name').'"
                        required><input type="hidden" value="no_id" name="province_id" />' ;
      }

      return  $output ;
    }

    /*
    |--------------------------------------------------------------------------
    | SHOPPING CART ACTIONS (ADD/EDIT/DELETE)
    |--------------------------------------------------------------------------
    */

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

    public function addToCart(Request $request)
    {

        Log::debug(json_encode($request->input(), JSON_PRETTY_PRINT));
 
        $product = getProductData($request->product_id);
         
       // debug_ajax($product);
       
        $variants = array_values((array)$product->variants);
//        debug_ajax($variants);
      
        if ($request->option1_value === null && $request->option2_value === null && $request->option3_value === null)
        {
            $filtered = [$variants[0]];
        }
        else {
            $filtered = array_filter($variants, function($el) use ($request) {
                return $el->option1_value === $request->option1_value && $el->option2_value === $request->option2_value && $el->option3_value === $request->option3_value;
            });
        }

        if ($filtered == null)
        {
            return response()->json([
                'success' => 0,
                'message' => "This combination is not available in our stock."
            ]);
        }

         $variant = array_values($filtered)[0];
//        return response()->json($filtered);

        //Get the data of the variant we are adding to cart
        $variant= getVariantData($variant->id);
        // Search if the variant we want to add to cart already is in the cart.
        $item = Cart::search(function ($cartItem, $rowId) use ($variant) {
            return $cartItem->options->variant_id === $variant->id;
        })->first();


        // We calculate the total number of items that we would need to remove from stock if we add this item to cart
        $qtyToRemoveFromStock = ($item != null) ? $item->qty + $request->qty : $request->qty;

        // We check if the variant has enough stock and is valid to be added to cart
        $isValid = variantIsValid($variant->id, $qtyToRemoveFromStock);
//        return response()->json($item);

        // If the total quantity of items to add is valid, we add it to the cart
        if($isValid->success == 1)
        {

        //    $french="";
        //    $arabic="";
        //    if($variant->product->arabic!=null){
        //      $arabic=$variant->product->arabic->title;
        //     }

        //     if($variant->product->french!=null){
        //      $french=$variant->product->french->title;
        //     }

              Cart::add([
                'id' => $variant->product->id, 
                'name' => $variant->product->title, 
                'qty' => $request->input('qty'), 
                'price' => $variant->price,
                'options' => [
                    'variant_id' => $variant->id,
                    'variant_title' => $variant->variant_title,
                    // 'product_arabic_title'=>$arabic,
                    // 'product_french_title'=>$french,
                    'img' => $variant->sm_img,
                    'compare_at_price' => $variant->compare_at_price
                ] 
            ]); 
  

            // If the user is SIGNED IN
            if( session()->get('user') !== null ) {
                $response = addToCartApi(session()->get('user')->id, $variant->id, $request->qty);
            }

            // If the user is GUEST
            elseif( session()->get('guest') !== null ) {
                $response = addToCartApi(session()->get('guest'), $variant->id, $request->qty);
            }
//            Log::debug(prettify($response));

           
            //Get the variant ID
            $data['variant_id'] = $variant->id;

            //Search for Item added in cart
            $data['item_qty'] = Cart::search(function ($cartItem, $rowId) use ($variant) {
                return $cartItem->options->variant_id === $variant->id;
            })->first()->qty;

            //Count number of items in cart
            $data['cart_count'] = Cart::content()->count();

            // Get Cart Subtotal
            $data['subtotal'] = $this->totalCart();
//            debug_ajax($data);

            $data['success'] = 1;

        }

        else {
            $data['success'] = 0;
            $data['message'] = "No more $product->title with this combination in stock.";
        }

        return response()->json($data);
    }



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
   

  public function editCartQty(Request $request)
    {
         // Get the variant we are removing from cart
        $variant = getVariantData($request->variant_id);

        // Search if the variant we want to add to cart already is in the cart.
        $data['item'] = Cart::search(function ($cartItem, $rowId) use ($variant) {
            return $cartItem->options->variant_id === $variant->id;
        })->first();


        // If the item was not found in shopping cart, we add it to the cart.
        if($data['item'] == null)
        {
            $data = $this->addToCart($request);
            return response()->json($data->original);
        }

        // If the item exists in the shopping cart we initiate the updating qty control
        else
        {
            // If we are deleting the product from the cart we do not need to do the validation
            if($request->qty == 0)
            {
                $data['success'] = 1;
            }

            else
            {
                // We check if the variant has enough stock and is valid to be added to cart
                $isValid = variantIsValid($request->variant_id, $request->qty);

                // Get if Variant is valid
                if ($isValid == true) {
                    $data['success'] = $isValid->success;
                }
            }

            // If the total quantity of items to add is valid, we add it to the cart
            if($data["success"] == 1)
            {
                Cart::update($data['item']->rowId, $request->qty);

                // If the user is signed IN Sync with Online Database
                if(session()->get('user') !== null)
                    $response = updateCartQtyApi(session()->get('user')->id, $request->variant_id, $request->qty);

                // If the user is GUEST
                elseif( session()->get('guest') !== null )
                    $response = updateCartQtyApi(session()->get('guest'), $request->variant_id, $request->qty);
            }

            //Get the variant ID
            $data['variant_id'] = $variant->id;

            $data['item_qty'] = $request->qty;

            //Count number of items in cart
            $data['cart_count'] = Cart::content()->count();

            // Get Cart Subtotal
            $data['subtotal'] = $this->totalCart();

            return response()->json($data);
        }


    }




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
    public function removeCartQty(Request $request)
    {   
         // Get the variant we are removing from cart
        $variant = getVariantData($request->variant_id);

        // Search if the variant we want to add to cart already is in the cart.
        $data['item'] = Cart::search(function ($cartItem, $rowId) use ($variant) {
            return $cartItem->id === $variant->product->id;
        })->first();

        $newQty = isset($data['item']) ? $data['item']->qty - $request->qty : $request->qty;

        // If the final quantity after removing is more than 0 we execute the change
        if($newQty >= 0)
        {
            $data['success'] = 1;

            // Update the quantity in Cart with the new quantity
            Cart::update($data['item']->rowId, $newQty);

            // If the user is signed IN Sync with Online Database
            if(session()->get('user') !== null)
                $response = updateCartQtyApi(session()->get('user')->id, $request->variant_id, $newQty);

            // If the user is Sync with the online Database GUEST
            elseif( session()->get('guest') !== null )
                $response = updateCartQtyApi(session()->get('guest'), $request->variant_id, $newQty);
            
            //Get the variant ID
            $data['variant_id'] = $variant->id;

            //Count number of items in cart
            $data['cart_count'] = Cart::content()->count();

            // Get Cart Subtotal
            $data['subtotal'] = Cart::subtotal();
        }

        // If the final quantity after removing is less than 0
        else
            $data['success'] = 0;

        return response()->json($data); 
    }


    /*
    |--------------------------------------------------------------------------
    | CHECKOUT PROCESS
    |--------------------------------------------------------------------------
    */


    /**
    * STEP 1 - Displays the Shopping cart
    *
    * @return Http Response
    */
    public function shoppingCart()
    {  


        SEOMeta::setTitle(app('settings')->store_address->store_name.' | Shopping Cart - Purchase your products');
        SEOMeta::setDescription('Manage your shopping cart');

        // Get Cart Content
        $cart = Cart::content();

        // Get Cart Subtotal
        $cartSubTotal = $this->totalCart();
       
         $total_case=1;
        return view('checkout.shopping-cart', compact('cart', 'cartSubTotal','total_case')); 
    }


    public function currencyLoad(Request $request){
        session()->put('currency_rate',$request->rate);
        session()->put('currency_code',$request->currency_code);
        session()->put('currency_id',$request->currency_id);
        $response['status']=true;
        return $response;
     }


    public function change_language(Request $request){
     session()->put('lang',$request->lang_code);
        $response['status']=true;
        return $response;
    }

    /**
    * STEP 2 - Displays the Checkout information
    *
    * @return Http Response
    */
    public function checkoutInfo()  
    {    
     
        SEOMeta::setTitle(app('settings')->store_address->store_name.' | Checkout - Information about you');
        SEOMeta::setDescription('Fill your checkout information');
           $total_case=1;

        // If the cart is empty redirect to shopping cart
        if(Cart::content()->count() == 0)
            return redirect()->route('shopping_cart_path');
        
        // Get the content of Gloudmans Cart
        $cart = Cart::content();

        // Get the subtotal of Gloudmans Cart
        $cartSubTotal = $this->totalCart();

        // Get the list of countries
        $countries = getCountriesDataApi();

        // Init User Email of checkout
        $userEmail = '';

        // If the user is signed in we set his Email and search for his addresses
        if(session()->get('user') !== null){

            // Get Email of the signed in user
            $userEmail = session()->get('user')->email; 

            // Get the user list of addresses
            $userData = getUserDataApi(session()->get('user')->id);
            $userAddresses = $userData->info->user_addresses;

            // Get all information fron Signed In checkout
            $checkoutData = getCheckoutDataApi(session()->get('user')->id);
        }

        // If the user buys as a GUEST we have to get the Checkout info  
        else
            $checkoutData = getCheckoutDataApi(session()->get('guest'));
         
        return view('checkout.information', compact('cart', 'cartSubTotal', 'userEmail',  'countries', 'checkoutData','total_case')); 
    }


    /**
    * STEP 3 - Display Shipping rates in checkout
    * @return Http Response
    */
    public function checkoutShipping()
    { 
        
        SEOMeta::setTitle(app('settings')->store_address->store_name.' | Checkout | Shipping methods');
        SEOMeta::setDescription('Select your shipping method');
         $total_case=3;
        // If the cart is empty redirect to shopping cart
        if(Cart::content()->count() == 0)
            return redirect()->route('shopping_cart_path');

        // Get the content of Gloudmans Cart
        $cart = Cart::content();

        // Get the subtotal of Gloudmans Cart
        $cartSubTotal =$this->totalCart();

        // Get the list of countries
        $countries = getCountriesDataApi();

        // Init User Email of checkout
        $userEmail = '';

        // If the user is signed in we set his Email and search for his addresses
        if(session()->get('user') !== null)
        {
            // Get Email of the signed in user
            $userEmail = session()->get('user')->email; 

            // Get all information fron Signed In checkout
            $checkoutData = getCheckoutDataApi(session()->get('user')->id);

            // Get the list of shipping rates
            $shippingRates = getShippingRatesApi(session()->get('user')->id);

        }

        // If the user buys as a GUEST we have to get the Checkout info  
        else
        {
            // Get all information fron Guest checkout
            $checkoutData = getCheckoutDataApi(session()->get('guest'));

            // Get the list of shipping rates
            $shippingRates = getShippingRatesApi(session()->get('guest'));

        }

         // dd($shippingRates) ;
        if(!isset($checkoutData))
            abort(403, 'Forbidden - Access denied');

        return view('checkout.shipping', compact('cart', 'cartSubTotal', 'userEmail', 'countries', 'checkoutData', 'shippingRates','total_case')); 
    }


    /**
    * STEP 4 - Display Payment methods for checkout
    * @return Http Response
    */
    public function payment()
    {
        SEOMeta::setTitle(app('settings')->store_address->store_name.' | Checkout | Payment method');
        SEOMeta::setDescription('Choose your payment method');
        $total_case=3;
        // If the cart is empty redirect to shopping cart
        if(Cart::content()->count() == 0)
            return redirect()->route('shopping_cart_path');

        // Get the content of Gloudmans Cart
        $cart = Cart::content();

        // Get the subtotal of Gloudmans Cart
        $cartSubTotal =$this->totalCart();

        // Get the list of countries
        $countries = getCountriesDataApi();

        // Init User Email of checkout
        $userEmail = '';

        // If the user is signed in we set his Email and search for his addresses
        if(session()->get('user') !== null)
        {
            // Get Email of the signed in user
            $userEmail = session()->get('user')->email; 

            // Get all information fron Signed In checkout
            $checkoutData = getCheckoutDataApi(session()->get('user')->id);
        }

        // If the user buys as a GUEST we have to get the Checkout info  
        else
            $checkoutData = getCheckoutDataApi(session()->get('guest'));
        if($checkoutData->shipping_fees_title == null)
            abort(403, 'Forbidden - Access denied');

        return view('checkout.payment', compact('cart', 'cartSubTotal', 'userEmail', 'countries', 'checkoutData','total_case')); 
    }

   

    public function removeAllSession(){
          session()->put('lat',33.888630);
          session()->put('lng',35.495480);
          session()->forget('title');
          session()->forget('firstname');
          session()->forget('lastname');
          session()->forget('shippingAddress');
          session()->forget('apartment');
          session()->forget('city');
          session()->forget('postal_code');
          session()->forget('country_id');
          session()->forget('phone');
          session()->forget('province');
          session()->forget('province_id');
    }


    /**
    * STEP 5 - Confirm the payment and proceed to checkout via CASH ON DELIVERY
    * @param user_id   ID of the user that is doing the order. 
    * @param payment_method   Payment method used by the user
    * @return Http Response
    */
    public function cashOnDelivery(Request $request)
    {  
        $this->removeAllSession();
         
        // If the cart is empty redirect to shopping cart
        if(Cart::content()->count() == 0)
            return redirect()->route('shopping_cart_path');

        // Validation form
        $request->validate([
            'payment_method' => 'required'
        ]);

        SEOMeta::setTitle(app('settings')->store_address->store_name.' | Thank you for your order');
        SEOMeta::setDescription('Order confirmed');

        // Get the user ID
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // We convert the order to a real order with the cash on delivery payment method
        $result = convertOrderApi($user_id, $cash_on_delivery = 1, "null");

        // If the conversion was successful we reset the cart and the guest session
        // if($result->error == '')
        // {
            Cart::destroy();
            session()->forget('guest');
            session()->forget('selected_address');
        // }

        return view('checkout.thank-you'); 
    }

    /*
    |--------------------------------------------------------------------------
    | MANAGE SHIPPING AND BILLING ADDRESSES
    |--------------------------------------------------------------------------
    */


    /**
    * Update the checkout information of the user
    * @param $request  Full Address of the user with his email and subscription to newsletters
    * @return Http Response
    */
    public function updateCheckoutInfo(Request $request)
    {
        // return $request;
        // Validation form
        $request->validate([
            'email' => 'email:rfc,dns|required',
            'title' => 'required_if:select_title,0|max:'.app('settings')->environment->address_title_max_char,
            'firstname' => 'required|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_firstname_max_char,
            'lastname' => 'required|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_lastname_max_char,
            'address' => 'required|max:'.app('settings')->environment->address_max_char,
            'apartment' => 'nullable|max:'.app('settings')->environment->address_apartment_max_char,
            'city' => 'required|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_city_max_char,
            'country_id' => 'required',
            'province_id' => 'required',
            'postal_code' => 'nullable|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_postal_code_max_char,
            'phone' => 'nullable|regex:/^[0-9+  s]+$/i|min:'.app('settings')->environment->user_phone_min_char.'|max:'.app('settings')->environment->user_phone_max_char,
        ]);
           
        // If the user is a guest
        if(session()->get('user') === null)
            $request->request->add(['user_id' => session()->get('guest')]); 


        // If user is signed in
        else
        {
            $request->request->add(['user_id' => session()->get('user')->id]); //add request user id

            // If the user decided to add a new address, we save it.
            if($request->select_title == 0)
                addUserAddressApi($request->all());

            //If the user decided to update an existing address. We update it.
            else
                updateUserAddressApi($request->all());

            // Create a session to remember the address selected by the user in the checkout
            session()->put('selected_address', $request->select_title);
        }

        //Update shipping information in checkout
        $response = updateShippingInfoApi($request->all());
        return redirect()->route('checkout_shipping_path');
        
    }


    /**
    * Update the shipping address of the user
    * @param $request  Full Address of the user
    * @return Http Response
    */
    public function updateShippingAddress(Request $request)
    {
        // Validation form
        $request->validate([
            'address' => 'required|max:'.app('settings')->environment->address_max_char,
            'apartment' => 'nullable|max:'.app('settings')->environment->address_apartment_max_char,
            'city' => 'required|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_city_max_char,
            'country_id' => 'required',
            'province_id' => 'required',
            'postal_code' => 'nullable|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_postal_code_max_char,
            'phone' => 'nullable|regex:/^[0-9+  s]+$/i|min:'.app('settings')->environment->user_phone_min_char.'|max:'.app('settings')->environment->user_phone_max_char,
        ]);

       

        //Get User ID
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // Assign user to request
        $request->request->add(['user_id' => $user_id]); 

        //Update shipping information in checkout
        $response = updateShippingInfoApi($request->all());


        return \Redirect::back();
    }


    /**
    * Update the billing address of the user
    * @param $request  Full Address of the user
    * @return Http Response
    */
    public function updateBillingAddress(Request $request)
    {
        
        // Validation form
        $request->validate([
            'address' => 'required|max:'.app('settings')->environment->address_max_char,
            'apartment' => 'nullable|max:'.app('settings')->environment->address_apartment_max_char,
            'city' => 'required|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_city_max_char,
            'country_id' => 'required',
            'province_id' => 'required',
            'postal_code' => 'nullable|regex:/^[a-z0-9\- ]+$/i|max:'.app('settings')->environment->address_postal_code_max_char,
            'phone' => 'nullable|regex:/^[0-9+  s]+$/i|min:'.app('settings')->environment->user_phone_min_char.'|max:'.app('settings')->environment->user_phone_max_char,
        ]);

        //Get User ID
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // Assign user to request
        $request->request->add(['user_id' => $user_id]); 

        //Update shipping information in checkout
        $response = updateBillingInfoApi($request->all());


        return \Redirect::back();
    }

    /**
    * AJAX - Get Address info of the selected address
    * @param address_id  Id of the address we want to get
    * @return $address Details of the address we selected
    */
    public function showCheckoutAddress(Request $request)
    {
        $address = getAddressDataApi($request->address_id, session()->get('user')->id);

         if($address!=null){
           
           session()->put('lat',$address->lat);
           session()->put('lng',$address->long);
           session()->put('title',$address->title);
           session()->put('firstname',$address->firstname);
           session()->put('lastname',$address->lastname);
           session()->put('shippingAddress',$address->address);
           session()->put('apartment',$address->apartment);
           session()->put('city',$address->city);
           session()->put('postal_code',$address->postal_code);
           session()->put('country_id',$address->country_id);
           session()->put('phone',$address->phone);
           session()->put('province',$address->province);
           session()->put('province_id',$address->province_id);
         }
         else{

          $this->removeAllSession();

         }
          session()->put('selected_address',$request->address_id);
           
       

        return response()->json($address);
    }



    /*
    |--------------------------------------------------------------------------
    | MANAGE SHIPPING RATES
    |--------------------------------------------------------------------------
    */

    /**
    * Update the shipping rate of the user's checkout order
    * @param $userId   ID of the user that is doing the order. 
    * @param rate_name   Name of the rate selected by the user.
    * @param rate_value   Value of the rate selected by the user.
    * @return Http Response
    */
    public function updateShippingRate(Request $request)
    {   
        // Validation form
        $request->validate([
            'shipping_rate' => 'required',
            'notes' => 'max:250'
        ]);

        //Get User ID who is paying
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // Assign user to request
        $request->request->add(['user_id' => $user_id]); 

        // Update the Notes of the order
        $response = updateNotesApi($request->all());

        //Update shipping information in checkout
        $response = updateShippingRateApi($request->all());

        return redirect()->route('checkout_payment_path');
    }



    /*
    |--------------------------------------------------------------------------
    | PROMO CODE
    |--------------------------------------------------------------------------
    */


    /**
    * Apply promo code to the checkout of the user
    * @param promo_code  Promo code that we are applying to the checkout
    * @return Http Response
    */
    public function applyPromoCode(Request $request)
    {
        // Validation form
        $request->validate(['promo_code' => 'required']);

        $userId = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        $msg = applyPromoCodeApi($request->promo_code, $userId);

        // If the promo code is not valid 
        if($msg->success == 0)
            session()->flash('error', $msg->message);

        return \Redirect::back();
    }


    /**
    * Remove promo code from checkout
    * @param promoCode  Promo code Id that we are applying to the checkout
    * @return Http Response
    */
    public function removePromoCode($promoCode)
    {
        removePromoCodeApi($promoCode, session()->get('user')->id);

        return \Redirect::back();
    }

   

    


}