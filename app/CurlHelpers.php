<?php

use GuzzleHttp\Client;

// Call an API via GET Request
function httpGetRequest($url)
{   
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "neocomz-api-key: ".env('NEOCOMZ_API_KEY'),
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $response = json_decode($response);

    curl_close($curl);

    if ($err) 
        return $err;
    else 
         return $response;
}

// Call an API via POST Request
function httpPostRequest($url, $params)
{   
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $params,
      CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "neocomz-api-key: ".env('NEOCOMZ_API_KEY'),
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $response = json_decode($response);

    curl_close($curl);

    if ($err) 
        return $err;
    else 
         return $response;
}



/*
|--------------------------------------------------------------------------
| SEARCH
|--------------------------------------------------------------------------
*/

/**
* Search the list of products associated to specific keywords
* 
* @param $Request Keyword
* @return List of Products
*/
function getSearchBarData($request)
{ 
    $url = env('API_URL')."/api/search/";

    return $response = httpPostRequest($url, $request);
}


/*
|--------------------------------------------------------------------------
| PAGES
|--------------------------------------------------------------------------
*/

/**
 * Return all the pages with its sub pages and its components
 *
 * - All Pages
 * -- Sub pages
 * --- Sub Page (selected)
 * ---- Components
 * ----- Component (selected)
 *
 * @param $sorting  ('ASC', 'DESC', 'POS')
 * @return array $allPages
 */

function getAllPagesData($sorting)
{ 
    $url = env('API_URL')."/api/allpages/".$sorting;

    return $response = httpGetRequest($url);
}



/**
 * Return all the pages with its sub pages and its components
 *
 * - Pages
 * -- Sub pages
 * --- Sub Page (selected)
 * ---- Components
 * ----- Component (selected)
 *
 * @param $page_id
 * @param $sorting  ('ASC', 'DESC', 'POS')
 * @return array $allPages
 */
function getPageData($page_id, $sorting)
{ 
    $url = env('API_URL')."/api/pages/".$page_id."/".$sorting;

    return $response = httpGetRequest($url);
}


/**
* Return a list of pages based on a specific keyword
*
* - Pages
*
* @param $keywords
* @return array $page
*/
function getPageDataByKeywords($keywords)
{ 
    $url = env('API_URL')."/api/pages-search/".$keywords;

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| wishlist
|--------------------------------------------------------------------------
*/

function show_userWishList($user_id)
{
    $url = env('API_URL')."/api/show_userWistList/".$user_id;

    return $response = httpGetRequest($url);
}

function remove_Product_FromWishList($user_id,$variant_id)
{
    $url = env('API_URL')."/api/remove_Product_FromWishList/".$user_id."/".$variant_id;

    return $response = httpGetRequest($url);
}

function add_To_WishList($user_id,$variant_id)
{
    $url = env('API_URL')."/api/add_To_WishList/".$user_id."/".$variant_id;

    return $response = httpGetRequest($url);
}



/*
|--------------------------------------------------------------------------
| MENUS
|--------------------------------------------------------------------------
*/

/**
 * Return all the Menus with its sub Menus recursively
 *
 * - All Menus
 * -- Root Items
 * --- Item (Selected)
 * ---- Sub Items
 * ----- Sub Item (Selected)
 *
 * @return array $allCategories
*/
function getAllMenusData()
{ 
    $url = env('API_URL')."/api/menus/";

    return $response = httpGetRequest($url);
}

/**
 * Return One specific menu with its sub Menus recursively
 *
 * - Menu
 * -- Root Items
 * --- Item (Selected)
 * ---- Sub Items
 * ----- Sub Item (Selected)
 *
 * @param $menu_id
 * @return array $menuData
 */
function getMenuData($menu_id)
{ 
    $url = env('API_URL')."/api/menus/".$menu_id;

    return $response = httpGetRequest($url);
}

/**
* Return One specific menu item with its sub Menus recursively
*
* --- Item
* ---- Sub Items
* ----- Sub Item
*
* @param $menu_item_id
* @return array $menuItem
*/
function getMenuItemData($menu_item_id)
{ 
    $url = env('API_URL')."/api/menu-items/".$menu_item_id;

    return $response = httpGetRequest($url);
}

/*
|--------------------------------------------------------------------------
| CATEGORIES
|--------------------------------------------------------------------------
*/

/**
 * Return all the categories with its products and the main variant associated
 *
 * - All Categories
 * -- Category
 * --- Products Of Category
 * ---- Product (Selected)
 * ----- First Variant
 *
 * @return array $allCategories
 */
function getAllCategoriesData()
{ 
    $url = env('API_URL')."/api/categories/";

    return $response = httpGetRequest($url);
}


/**
 * Returns a specific category with its products and the main variant associated
 * 
 * -- Category 
 * --- Products of Category
 * ---- Product (Selected)
 * ----- First Variant
 *
 * @param $category_id
 * @return $category
 */
function getCategoryData($category_id)
{ 
    $url = env('API_URL')."/api/categories/".$category_id;

    return $response = httpGetRequest($url);
}

function getCategoryDataSorted($category_id, $sorting)
{
    $url = env('API_URL')."/api/categories/".$category_id."/".$sorting;
    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| PRODUCTS
|--------------------------------------------------------------------------
*/

/**
 * Return all the products with its variants
 *
 * - All Products
 * -- Product (Selected)
 * --- Variants
 * ---- Variant (Selected)
 *
 * @return array $allPages
 */
function getAllProductsData()
{ 
    $url = env('API_URL')."/api/products/";

    return $response = httpGetRequest($url);
}

function showAllProductsSorted($sorting)
{
    $url = env('API_URL')."/api/products/paginate-".$sorting;
    return $response = httpGetRequest($url);
}


/**
 * Return One specific products with its variants
 *
 * - All Products
 * -- Product (Selected)
 * --- Variants
 * ---- Variant (Selected)
 * @param $product_id
 * @return array $allPages
 */

function getProductData($product_id)
{
    $url = env('API_URL')."/api/products/".$product_id;

    return $response = httpGetRequest($url);
}



/*
|--------------------------------------------------------------------------
| TAGS
|--------------------------------------------------------------------------
*/

/**
 * Return all the product tags with its products
 * @return array $allTags
 */
function getAllTagsData()
{ 
    $url = env('API_URL')."/api/tags/";

    return $response = httpGetRequest($url);
}

/**
 * Return One specific tag with its products
 * @param $tag_id
 * @return array $tag
 */
function getTagData($tag_id)
{ 
    $url = env('API_URL')."/api/tags/".$tag_id;

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| VARIANTS
|--------------------------------------------------------------------------
*/


/**
 * Return One specific variant with the product to which it belongs
 *
 * - Variant (Selected)
 * -- Product (Parent)
 *
 * @param $variant_id
 * @return $variant
 */
function getVariantData($variant_id)
{ 
    $url = env('API_URL')."/api/variants/".$variant_id;

    return $response = httpGetRequest($url);
}


/**
 * Check if the variant is valid to be placed in an order
 * The validity controls, stocks and other error types
 *
 * @param $variant_id
 * @param $qty
 * @return $isValid [Success = 1 Or 0].
 */
function variantIsValid($variant_id, $qty)
{
    $url = env('API_URL')."/api/variants/is-valid/".$variant_id."/".$qty;

    return $response = httpGetRequest($url);
}




/*
|--------------------------------------------------------------------------
| SIGN IN / SIGN UP
|--------------------------------------------------------------------------
*/

/**
 * Check if Login Credentials are correct and returns the Data of the User connected
 * 
 * @param Email
 * @param Password
 *
 * @return User
 * - User ID
 * - User First name
 * - User Last name
 * - User Email
 *
 */
function userSignIn($request)
{ 
    $url = env('API_URL')."/api/sign-in/";
    return $response = httpPostRequest($url, $request);
}

/**
 * Signs up new users and returns the data of the new signed up user
 *
 * @param Firstname
 * @param Lastname
 * @param Email
 * @param Password
 *
 * @return User
 * - User ID
 * - User First name
 * - User Last name
 * - User Email
 *
 */
function userSignUp($request)
{ 
    $url = env('API_URL')."/api/sign-up/";
    return $response = httpPostRequest($url, $request);
}

// function userSignUp_google_fb($id,$email,$firstname,$lastname,$option)
// { 
//     $url = env('API_URL')."/api/sign-up-google-fb/".$id."/".$email."/".$firstname."/".$lastname."/".$option;

//        return $response = httpGetRequest($url);
    
// }
 
function userSignUp_google_fb($request)
{ 
    $url = env('API_URL')."/api/sign-up-google-fb/";
   return $response = httpPostRequest($url, $request);
  
}


/**
* Reset password of the user (if he exists) and sends him an email with the new password.
*
* @param Email
*/
function resetThePassword($request)
{ 
    $url = env('API_URL')."/api/reset-password";

    return $message = httpPostRequest($url, $request);
}


/**
* Update actual password
* @param request
* @param - Old Password
* @param - New Password
* @param - Confirm New Password
* @param - User ID
* @return Http Response
*/
function updatePasswordApi($request)
{
    $url = env('API_URL')."/api/update-password";
    return $message = httpPostRequest($url, $request);
}


function getUserOrdersApi($user_id)
{
    $url = env('API_URL')."/api/user-orders/".$user_id;

    return $response = httpGetRequest($url);
}

/*
|--------------------------------------------------------------------------
| GENERAL SETTINGS
|--------------------------------------------------------------------------
*/

/**
* Get all the settings of the application
*
* @return General Settings
* @return Preferences
* @return Checkout
*
*/
function generalSettingsApi()
{
    $url = env('API_URL')."/api/general-settings";

    return $response = httpGetRequest($url);
}

/*
|--------------------------------------------------------------------------
| CONFIRM NOTIFICATION
|--------------------------------------------------------------------------
*/

/**
* Get all the notification of the application
*
* @return Confirm notification
* @return Preferences
* @return Checkout
*
*/
function confirmNotificationApi()
{
    $url = env('API_URL')."/api/confirm-notification";

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

/**
* Add an item to cart in the DATABASE
*
* @param $user_id  ID of the user to which the checkout order belongs
* @param $variant_id  ID of the variant we are adding to cart
* @param $qty  QTY of item we are adding to the order
*
* @return JSON Response
*/
function addToCartApi($user_id, $variant_id, $qty)
{
    $url = env('API_URL')."/api/add-to-cart/".$user_id."/".$variant_id."/".$qty;

    return $response = httpGetRequest($url);
}

/**
* Update Cart QTY in the DATABASE
*
* @param $user_id  ID of the user to which the checkout order belongs
* @param $variant_id  ID of the variant we are adding to cart
* @param $qty  QTY of item we are adding to the order
*
* @return JSON Response
*/
function updateCartQtyApi($user_id, $variant_id, $qty)
{
    $url = env('API_URL')."/api/edit-cart-qty/".$user_id."/".$variant_id."/".$qty;

    return $response = httpGetRequest($url);
}

/**
* Get all the Cart Data of a specific User from the DATABASE
*
* @param $user_id  ID of the user to which the checkout order belongs
*
* @return $orderItems Array of order items corresponding to the cart of the user
*/
function getCartDataApi($user_id)
{
    $url = env('API_URL')."/api/cart-data/".$user_id;

    return $response = httpGetRequest($url);
}

/**
* Delete a checkout from the database
*
* @param $user_id  ID of the user to which the checkout order belongs
*
*/
function deleteCheckoutApi($user_id)
{
    $url = env('API_URL')."/api/delete-checkout/".$user_id;

    return $response = httpGetRequest($url);
}


/**
* Update the shipping information of the user's checkout
*
* @param user_id
* @param email
* @param newletters
* @param select_title
* @param title
* @param firstname
* @param lastname
* @param apartment
* @param city
* @param country_id
* @param postal_code
* @param phone
*
*/
function updateShippingInfoApi($request)
{
    $url = env('API_URL')."/api/update-shipping-info";

    return $response = httpPostRequest($url, $request);
}

/**
* Update the billing information of the user's checkout
*
* @param user_id
* @param email
* @param newletters
* @param select_title
* @param title
* @param firstname
* @param lastname
* @param apartment
* @param city
* @param country_id
* @param postal_code
* @param phone
*
*/
function updateBillingInfoApi($request)
{
    $url = env('API_URL')."/api/update-billing-info";

    return $response = httpPostRequest($url, $request);
}

/**
* Get all the checkout information of the actual user
*
* @param $user_id   Id of the user who is on the checkout
* @return $checkoutInfo  All the info related to the checkout
*
*/
function getCheckoutDataApi($user_id)
{
    $url = env('API_URL')."/api/checkout-info/".$user_id;

    return $response = httpGetRequest($url);
}

/**
* Checks if the promo code is valid and apply the discount on the checkout if it is
*
* @param $promoCode   Promo code that we are applying to the checkout
* @param $userId  ID of the user who is using the promocode
* @return Success or Error message
*/ 
function applyPromoCodeApi($promoCode, $userId)
{
    $url = env('API_URL')."/api/apply-promo-code/".$promoCode."/".$userId;

    return $response = httpGetRequest($url);
}


/**
* Remove applied promo code from checkout
*
* @param $promoCodeId  ID of Promo code that we are removing from checkouts
* @param $userId  ID of the user from which we are removing the promo
* @return Success or Error message
*/ 
function removePromoCodeApi($promoCodeId, $userId)
{
    $url = env('API_URL')."/api/remove-promo-code/".$promoCodeId."/".$userId;

    return $response = httpGetRequest($url);
}



/**
* Get the list of shipping rates available
* @param $userId   ID of the user that is doing the order. 
* @return List of shipping rates
*/
function getShippingRatesApi($userId)
{
    $url = env('API_URL')."/api/get-shipping-rates/".$userId;

    return $response = httpGetRequest($url);
}

/**
* Update the shipping rate of the user's checkout order
* @param $userId   ID of the user that is doing the order. 
* @param rate_name   Name of the rate selected by the user.
* @param rate_value   Value of the rate selected by the user.
*/
function updateShippingRateApi($request)
{
    $url = env('API_URL')."/api/checkout-update-shipping-rate/";

    return $response = httpPostRequest($url, $request);
}


/**
* Update notes of the order
* @param $notes   ID of the user that is doing the order. 
*/
function updateNotesApi($request)
{
    $url = env('API_URL')."/api/checkout-update-notes/";

    return $response = httpPostRequest($url, $request);
}



/**
* Confirm the payment of the user
* @param user_id   ID of the user that is doing the order. 
* @param payment_method   Payment method used by the user
* @return $new_order   List of items that were not saveed into order.
*/
function convertOrderApi($user_id, $payment_method, $bank_ref = '')
{
    $url = env('API_URL')."/api/checkout-confirm-payment/".$user_id."/".$payment_method."/".$bank_ref;

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

/**
* Get Data About the Actual User
* 
* @param $user_id
*
* @return User
* - Info
* - Addresses
* - Default Address
* - Converted Orders
* - Canceled Orders
*
*/
function getUserDataApi($user_id)
{
    $url = env('API_URL')."/api/users/".$user_id;

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| Addresses
|--------------------------------------------------------------------------
*/

/**
* Get Data Address Information of all addresses of a specific user
* 
* @param $user_id
* @return Address
*/
function getAllAddressDataApi($user_id)
{
    $url = env('API_URL')."/api/addresses/".$user_id;

    return $response = httpGetRequest($url);
}

/**
* Get Data Address Information of a specific address
* 
* @param $address_id
* @param $user_id
* @return Address
*/
function getAddressDataApi($address_id, $user_id)
{
    $url = env('API_URL')."/api/addresses/".$address_id."/".$user_id;

    return $response = httpGetRequest($url);
}

/**
* Add an address to the user
* 
* @param $request  All information associated to the address
*
*/
function addUserAddressApi($request)
{
    $url = env('API_URL')."/api/add-user-address";

    return $response = httpPostRequest($url, $request);
}

/**
* Update an address of the user
* 
* @param $request  All information associated to the address
*
*/
function updateUserAddressApi($request)
{
    $url = env('API_URL')."/api/update-user-address";

    return $response = httpPostRequest($url, $request);
}


function deleteAddressApi($address_id, $user_id)
{
    $url = env('API_URL')."/api/delete-address/".$address_id."/".$user_id;

    return $response = httpGetRequest($url);
}


/*
|--------------------------------------------------------------------------
| Countries
|--------------------------------------------------------------------------
*/

/**
* Get all countries to display
*
* @return $countries List of countries
*/
function getCountriesDataApi()
{
    $url = env('API_URL')."/api/countries/";

    return $response = httpGetRequest($url);
}

function dealsApi()
{
    $url = env('API_URL')."/api/deals/";

    return $response = httpGetRequest($url);
}


function seoFriendly($string) {
    return str_replace('---', '-', 
        str_replace(' ', '-', preg_replace('/[^a-z0-9]/', '-', strtolower($string)))
    );
}



function isEnabledFeature($feature)
{
    $url = env('API_URL')."/api/isEnabledFeature/".$feature;

    return $response = httpGetRequest($url);
}

function isEnabledSpecialTag($tag)
{
    $url = env('API_URL')."/api/isEnabledSpecialTag/".$tag;

    return $response = httpGetRequest($url);
}


function provinces($country_id)
{
    $url = env('API_URL')."/api/provinces/".$country_id;

    return $response = httpGetRequest($url);
}