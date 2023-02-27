<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Artesaos\SEOTools\Facades\SEOMeta;
   
class StripePaymentController extends Controller
{
    public function __construct()
    {   
        // get all the currency global variable and bind it  in a container 
        app()->singleton('settings', function(){ return  generalSettingsApi(); });
    }

  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try 
        {
            // Get the user ID
            $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

            // Get the shopping cart we are purchasing
            $cart = getCartDataApi($user_id);
        
            Stripe\Stripe::setApiKey(app('settings')->checkout->stripe_secret_key);
            
            $charge = Stripe\Charge::create ([
                    "amount" => $cart->total * 100,
                    "currency" => app('settings')->checkout->stripe_currency,
                    "source" => $request->stripeToken,
                    "description" => "Order from Stripe",
                    "metadata" => [
                        "order_id" => $cart->id,
                        "user_name" => $cart->user_name,
                        "user_email" => $cart->user_email,
                        "user_phone" => $cart->user_phone,
                        "shipping_firstname" => $cart->shipping_firstname,
                        "shipping_lastname" => $cart->shipping_lastname,
                        "fullShippingAddress" => $cart->fullShippingAddress,
                        "fullBillingAddress" => $cart->fullBillingAddress,
                        "created_at" => $cart->created_at,
                        "user_name" => $cart->user_name,
                        "user_name" => $cart->user_name
                ]
            ]);


            if($charge->status == "succeeded")
            {
                // If the payment method is STRIPE (#id 4)
                $new_order = convertOrderApi($user_id, $stripe = 4, $charge->id);

                // If the order is successful
                if($new_order->error == '')
                {
                    Cart::destroy();
                    session()->forget('guest');
                    session()->forget('selected_address');
                }

                SEOMeta::setTitle('Thank you for your order');
                SEOMeta::setDescription('Order confirmed');

                return view('checkout.thank-you'); 
            }

            else
                return view('checkout.payment-error'); 
        } 

        catch(\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            echo 'Status is:' . $e->getHttpStatus() . '\n';
            echo 'Type is:' . $e->getError()->type . '\n';
            echo 'Code is:' . $e->getError()->code . '\n';
            // param is '' in this case
            echo 'Param is:' . $e->getError()->param . '\n';
            echo 'Message is:' . $e->getError()->message . '\n';
        } 

        catch (\Stripe\Exception\RateLimitException $e) {
            echo 'Too many requests made to the API too quickly';
        } 

        catch (\Stripe\Exception\InvalidRequestException $e) {
            echo 'Invalid parameters were supplied to Stripe\'s API';
        } 

        catch (\Stripe\Exception\AuthenticationException $e) {
            echo 'Authentication with Stripe\'s API failed';
        } 

        catch (\Stripe\Exception\ApiConnectionException $e) {
            echo 'Network communication with Stripe failed';
        } 

        catch (\Stripe\Exception\ApiErrorException $e) {
            echo 'Display a very generic error to the user, and maybe send yourself an email';
        } 

        catch (Exception $e) {
            echo 'Something else happened, completely unrelated to Stripe';
        }

    
    }
}