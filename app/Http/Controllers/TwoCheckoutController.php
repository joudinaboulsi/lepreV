<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Library\Twocheckout;
use App\Library\Twocheckout\Twocheckout_Charge; 

require_once(app_path()."/Library/Twocheckout.php");

class TwoCheckoutController extends Controller
{
    public function __construct()
    {   
        // get all the currency global variable and bind it  in a container 
        app()->singleton('settings', function(){ return  generalSettingsApi(); });
    }


    public function payTwoCheckout(Request $request)
    {
        // Get the user ID
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // Get the shopping cart we are purchasing
        $cart = getCartDataApi($user_id);

        // Buyer Info
        $email = $cart->user_email;
        $phoneNumber = $cart->user_phone;

        Twocheckout::privateKey(app('settings')->checkout->two_checkout_private_key);
        Twocheckout::sellerId(app('settings')->checkout->two_checkout_merchant_code);
        Twocheckout::verifySSL(false);

        try 
        {
            $charge = Twocheckout_Charge::auth(array(
                "merchantOrderId" => $cart->id,
                "token" => $_POST['token'],
                "currency" => app('settings')->checkout->two_checkout_currency,
                "total" => $cart->total,
                "billingAddr" => array(
                    "name" => $cart->billing_firstname.' '.$cart->billing_lastname,
                    "addrLine1" => $cart->billing_address,
                    "city" => $cart->billing_city,
                    "state" => $cart->billing_city,
                    "zipCode" => $cart->billing_postal_code,
                    "country" => $cart->billing_country,
                    "email" => $email,
                    "phoneNumber" => $phoneNumber
                ),
                "shippingAddr" => array(
                    "name" => $cart->shipping_firstname.' '.$cart->shipping_lastname,
                    "addrLine1" => $cart->shipping_address,
                    "city" => $cart->shipping_city,
                    "state" => $cart->shipping_city,
                    "zipCode" => $cart->shipping_postal_code,
                    "country" => $cart->shipping_country,
                    "email" => $email,
                    "phoneNumber" => $phoneNumber
                ),
                "demo" => true
            ));

            if ($charge['response']['responseCode'] == 'APPROVED') 
            {
                // If the payment method is 2CHECKOUT (#id 5)
                $newOrder = convertOrderApi($user_id, $twoCheckout = 5, $charge['response']['orderNumber']);
        
                // If the order is successful
                if($newOrder->error == '')
                {
                    Cart::destroy();
                    session()->forget('guest');
                    session()->forget('selected_address');
                }

                return view('checkout.thank-you'); 

            }
        } 

        catch (Twocheckout_Error $e) 
        {
            print_r($e->getMessage());
        }
    }


  




}
