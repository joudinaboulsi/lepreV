<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/GetProductVariant/{product_id}", function ($product_id, Request $request) {
    $product = getProductData($product_id);
    $variants = array_values((array)$product->variants);

    $filtered = array_filter($variants, function($el) use ($request) {
        return $el->option1_value === $request->option1_value && $el->option2_value === $request->option2_value && $el->option3_value === $request->option3_value;
    });

//    return json_encode($request->input(), JSON_PRETTY_PRINT);

    if (is_null($filtered))
    {
        return response()->json([
            'success' => 0,
            'variant' => null
        ], 200);
    }

    $variant = array_values($filtered)[0];

 
        $variant->price =$variant->price;
        $variant->compare_at_price = $variant->compare_at_price ;


//    return json_encode($variant, JSON_PRETTY_PRINT);

    return response([
        "success" => 1,
        "variant" => $variant
    ], 200);

//        return response()->json($filtered);
//
//    //Get the data of the variant we are adding to cart
//    $variant = getVariantData($variant->id);
//
//    return $variant;

});