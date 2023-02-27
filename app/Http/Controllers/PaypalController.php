<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Artesaos\SEOTools\Facades\SEOMeta;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
   
class PaypalController extends Controller
{
    public function __construct()
    {   
        // get all the currency global variable and bind it  in a container 
        app()->singleton('settings', function(){ return  generalSettingsApi(); });

        /** PayPal api context **/
        $this->_api_context = new ApiContext( new OAuthTokenCredential( 
            app('settings')->checkout->paypal_client_id, 
            app('settings')->checkout->paypal_secret ) 
        );

        $this->_api_context->setConfig(
            array(
                'mode' => env('PAYPAL_MODE', app('settings')->checkout->paypal_mode),
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

    }


    public function payWithpaypal(Request $request)
    {
        // Get the user ID
        $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

        // Get the shopping cart we are purchasing
        $cart = getCartDataApi($user_id);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $allItems = [];
        foreach($cart->orderItems as $orderItem)
        {
            $item = new Item();
            $item->setName($orderItem->product_title)
                ->setCurrency(app('settings')->checkout->paypal_currency)
                ->setQuantity($orderItem->quantity)
                ->setSku($orderItem->sku) // Similar to `item_number` in Classic API
                ->setPrice($orderItem->price);

            array_push($allItems, $item);
        }

        if($cart->discount_code != null)
        {
            $item = new Item();
            $item->setName($cart->discount_code)
                ->setCurrency(app('settings')->checkout->paypal_currency)
                ->setQuantity(1)
                ->setPrice(-$cart->discount_value);

            array_push($allItems, $item);
        }

        $itemList = new ItemList();
        $itemList->setItems($allItems);

        $details = new Details();
        $details->setShipping($cart->shipping_fees)
            ->setTax($cart->taxAmount)
            ->setSubtotal($cart->subTotal);

        $amount = new Amount();
        $amount->setCurrency(app('settings')->checkout->paypal_currency)
            ->setTotal($cart->total)
            ->setDetails($details);

 
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription("Payment Paypal");


        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paypalSuccess'))
            ->setCancelUrl(route('home_path'));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/

        try 
        {
            $payment->create($this->_api_context);
        } 

        catch (\PayPal\Exception\PPConnectionException $ex) {
 
            if (\Config::get('app.debug')) {
 
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
 
            } else {
 
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return \Redirect::route('paywithpaypal');
 
            }
 
        }
 
        foreach ($payment->getLinks() as $link) {
 
            if ($link->getRel() == 'approval_url') 
            {
                $redirect_url = $link->getHref();
                break;
            }
 
        }
 
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
 
        if (isset($redirect_url)) 
        {
 
            /** redirect to paypal **/
            return \Redirect::away($redirect_url);
 
        }
 
        \Session::put('error', 'Unknown error occurred');
        return \Redirect::route('paywithpaypal');
 
    }


    public function paypalSuccess()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
 
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($_GET['PayerID']) || empty($_GET['token']))
        {
            \Session::put('error', 'Payment failed');
            return view('checkout.payment-error'); 
        }
 
        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
 
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

 
        if ($result->getState() == 'approved') {
 
            // Get the user ID
            $user_id = (session()->get('user') !== null) ? session()->get('user')->id : session()->get('guest');

            // Get the transaction Sale ID
            $transactions = $payment->getTransactions();
            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();

            // If the payment method is PAYPAL (#id 3)
            $result = convertOrderApi($user_id, $paypal = 3, $sale->getId());

            // If the order is successful
            if($result->error == '')
            {
                Cart::destroy();
                session()->forget('guest');
                session()->forget('selected_address');
            }

            \Session::put('success', 'Payment success');
            return view('checkout.thank-you'); 
 
        }
 
        \Session::put('error', 'Payment failed');
        return view('checkout.payment-error'); 
 
    }
  

}