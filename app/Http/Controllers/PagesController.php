<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Mail;

class PagesController extends Controller
{
    public function __construct()
    {
        // get all the settings and bind it  in a container
        app()->singleton('settings', function(){ return  generalSettingsApi(); });
        app()->singleton('footer', function(){ return  getPageData(13, 'POS'); });
    }

    //Home page
    public function home()
    {
        $data = getPageData(1, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('home', compact('data'));
    }

    //story page
    public function story()
    {
        $data = getPageData(2, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('story', compact('data'));
    }

    //all products page
    public function allProducts()
    {
        $data = getPageData(2, $sorting = 'POS');
        
        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('all-products', compact('data'));
    }
    
    //products category page
    public function productsCategory($category_id, $category_name)
    {
        $data = getPageData($category_id, $sorting = 'POS');
        // dd($data);        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('products-category', compact('data'));
    }
    
    //product details page
    public function productDetails($product_id, $product_name)
    {   
        $data = getPageData($product_id, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::opengraph()->addImage($data->components->image->lg_img);

        return view('product-details', compact('data'));
    }


    //news page
    public function news()
    {
        $data = getPageData(5, $sorting = 'POS');
        // dd($data);
        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('news', compact('data'));
    }

    //work page
    public function work()
    {
        $data = getPageData(9, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('work', compact('data'));
    }
    
    // send cv email
    public function getCV(Request $request)
    {
        $cv = $request->file('cv');
        
        if (! empty($_POST))
        {
            Mail::send('emails.careers', array('cv' => $cv), function($message) use ($cv) {
                $message->from('no-reply@le-pre.com', 'Website User');
                $message->to(app('settings')->store_address->customer_email)->subject('Career Request from Website');
                if($cv != NULL)
                    $message->attach($cv->getRealPath(), array('as' => 'cv.'.$cv->getClientOriginalExtension(), 'mime' => $cv->getMimeType()));
            });
            
            \Session::flash('msg', 'Email Sent!' );
            
            return redirect()->back();
        }
    }

    //csr page
    public function csr()
    {
        $data = getPageData(7, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('csr', compact('data'));
    }

    //contact page
    public function contact()
    {
        $data = getPageData(8, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('contact', compact('data'));
    }

    // search page
    public function getSearchData(Request $request)
    {   
        $data = getSearchBarData($request->all());
        return view('search', compact('data'));
    }
    
    //eshop page
    public function eshop()
    {
        $data = getPageData(1, $sorting = 'POS');
    
          $category_juices=  getCategoryDataSorted(1, "price_high_to_low");
          $category=  getCategoryDataSorted(2, "price_high_to_low");
        //  dd($category_juices);
    
        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        return view('eshop', compact('data','category_juices','category'));
    }
    
    //eshop category page
    public function eshopCategory($category_id, $category_name)
    {
        //get all category content from the CMS
        $data = getCategoryData($category_id);

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('eshop-category', compact('data'));
    }
    
    //eshop product details page
    public function eshopProduct($product_id, $product_name)
    {    
            $category=  getCategoryDataSorted(2, "price_high_to_low");
            $product = getProductData($product_id);
            $related_products = array();
            
        foreach($product->categories as $p){
            
                $category_products = getCategoryDataSorted($p->id, 'latest');
                
                foreach($category_products->products as $c){
                        if(!in_array($c, $related_products) & $c->id != $product_id){
                            array_push($related_products, $c);
                        }
                    }
        }
            $tempArr = array_unique(array_column($related_products, 'id'));
            $related_products = array_intersect_key($related_products, $tempArr);

            // getting the variants options
            $options = [];
            if (isset($product->option1_name))
            {
                $options['option1_name'] = ["name" => $product->option1_name, "options" => []];
            }
            if (isset($product->option2_name))
            {
                $options['option2_name'] = ["name" => $product->option2_name, "options" => []];
            }
            if (isset($product->option3_name))
            {
                $options['option3_name'] = ["name" => $product->option3_name, "options" => []];
            }
        foreach ($product->variants as $variant) {
                if (isset($variant->option1_value) && isset($options["option1_name"]["options"]) && !in_array($variant->option1_value, $options["option1_name"]["options"]))
                {
                    array_push($options["option1_name"]["options"], $variant->option1_value);
                }
                if (isset($variant->option2_value) && isset($options["option2_name"]["options"]) && !in_array($variant->option2_value, $options["option2_name"]["options"]))
                {
                    array_push($options["option2_name"]["options"], $variant->option2_value);
                }
                if (isset($variant->option3_value) && isset($options["option3_name"]["options"]) && !in_array($variant->option3_value, $options["option3_name"]["options"]))
                {
                    array_push($options["option3_name"]["options"], $variant->option3_value);
                }
        }
        
        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($product->seo_title, false);
        SEOTools::setDescription($product->seo_description);
        SEOMeta::setKeywords($product->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::opengraph()->addImage($product->photoGallery[0]->lg_img);
        return view('eshop-product', compact('product', 'related_products', 'options','category'));
    }
    
    //customize page
    public function customize()
    {
        $data = getPageData(1, $sorting = 'POS');

        //get url of the page
        $url = url()->current();

        SEOTools::setTitle($data->seo_title, false);
        SEOTools::setDescription($data->seo_description);
        SEOMeta::setKeywords($data->seo_keywords);
        SEOTools::opengraph()->setUrl(getenv('APP_URL'));
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');

        return view('customize', compact('data'));
    }

}