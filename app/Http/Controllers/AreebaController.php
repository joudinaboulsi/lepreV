<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Artesaos\SEOTools\Facades\SEOMeta;

class AreebaController extends Controller
{
    public function __construct()
    {   
        // get all the currency global variable and bind it  in a container 
        app()->singleton('settings', function(){ return  generalSettingsApi(); });

        // Create a Guest session for the user
        if(session()->get('guest') === null) 
            session()->put('guest', hexdec( uniqid() ));
    }


    public function fillAreebaOrderDetails($cart)
    {
        // create the order descritpion
        $orderDesc = '';

        // declare an empty array to pass it to configure()
        $areeba_items = []; 

        // PUT SHOPPING CART IN AREEBA CHECKOUT
        foreach($cart->items as $item)
        { 
            // Create array describing the item we are adding
            (object) $orderItem = array("name" => $item->product_title, "quantity" => $item->quantity, "unitPrice" => $item->price, "description"  => $item->variant_title);

            // push every item object in the items array
            array_push($areeba_items, $orderItem); 

            // build the prodcut description
            $orderDesc = $orderDesc.$item->product_title.' | '; 
        } 

        $orderDesc = rtrim($orderDesc,' | '); // remove the last separator from the string

        
        // PUT DISCOUNTS IN AREEBA CHECKOUT
        if($cart->discount_code != NULL)
        {
            // Create array describing the promo code we added
            (object) $discount = array("name" => 'Promo Discount', "quantity" => 1, "unitPrice" => -$cart->discount_value, "description"  => 'Promo code: '.$cart->discount_code); 

            // push every item object in the items array
            array_push($areeba_items, $discount); 
        }

        $areebaFormat['items'] = $areeba_items;
        $areebaFormat['description'] = $orderDesc;

        return $areebaFormat;
    }


    public function areebaPayment(Request $request)
    {   
        // Get the shopping cart we are purchasing
        $cart = getCartDataApi($request->user_id);

        // Fill the data we are going to send to Areeba
        $areebaFormat = $this->fillAreebaOrderDetails($cart);

        // PREPARE API CALL TO GET CHECKOUT SESSION

        // Build the URL of the cURL for the API call to create a checkout session
        $url = 'https://epayment.areeba.com/api/rest/version/51/merchant/'.app('settings')->checkout->areeba_merchant_id.'/session';

        // Generate a unique Bank Order Id
        $bank_order_id = uniqid();

        //set POST variables
        $fields = array(
            'apiOperation' => "CREATE_CHECKOUT_SESSION",
            'interaction' => array( 'returnUrl' => route('checkout_thank_you_areeba', $bank_order_id) ),
            'order' => array( 'id' => $bank_order_id, 'amount' => $cart->total, 'currency' => app('settings')->checkout->areeba_currency )
            );
          
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1); 
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        // Basic HTTP authentication 
        $username = "merchant.".app('settings')->checkout->areeba_merchant_id;
        $password = app('settings')->checkout->areeba_api_password;
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
      
        //Get response of the API
        $api_response = curl_exec($ch);

        //close connection
        curl_close($ch);

        // Response data
        $data['api_response'] = json_decode($api_response);
        $data['order'] = $cart;
        $data['areeba_format'] = $areebaFormat;

        return response()->json($data);

    }


    /**
    * Thank you page when payment is done from Areeba
    * @return Http Response
    */
    public function thankYou($bank_order_id)
    {
        SEOMeta::setTitle('Thank you for your order');
        SEOMeta::setDescription('Order confirmed');

        //URL of the API to test the success of the transaction
        $url = 'https://epayment.areeba.com/api/rest/version/51/merchant/'.app('settings')->checkout->areeba_merchant_id.'/order/'.$bank_order_id;

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        // Basic HTTP authentication 
        $username = "merchant.".app('settings')->checkout->areeba_merchant_id;
        $password = app('settings')->checkout->areeba_api_password;
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

        //execute post
        $response = curl_exec($ch);

        // get and decode API response
        $response = json_decode($response);

        //close connection
        curl_close($ch);

        // check if the payment response is successfull + the order is not register in the database + cart not empty + total != 0
        if($response->result == "SUCCESS")
        {
            // Get the user ID
            $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

            // If the payment method is AREEBA (#id 2)
            $result = convertOrderApi($user_id, $areeba = 2, $response->id);

            // If the order is successful
            if($result->error == '')
            {
                Cart::destroy();
                session()->forget('guest');
                session()->forget('selected_address');
            }

            return view('checkout.thank-you'); 
        }
        
    }

}
