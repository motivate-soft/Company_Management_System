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

Route::group([ 'prefix' => 'auth'], function (){ 


    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
     });


    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        //Customer API Routes
		// Route::post('add-product', 'CustomerProductController@add_product');

        //Create user address
        Route::post('create-address', 'UserController@create_address');
        //Update user address
        Route::post('update-address', 'UserController@update_address');
        //Update user address
        Route::post('delete-address', 'UserController@delete_address');
		 
        // Create order / checkout cart save  
        Route::post('create-order', 'OrderController@create_order');
		// User address new address create
        Route::get('user-addresses', 'UserController@get_addresses');

        // Order Tracking API Endpoint
        Route::get('order-tracking', 'OrderController@order_tracking');

        // User All Orders List
        Route::get('user-orders', 'OrderController@user_orders');
        // Single Order Details
        Route::get('order-details/{id}', 'OrderController@view'); 

    });


}); 

// Forget and reset password
Route::post('password/forget', 'Auth\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Cities list
Route::get('cities-list', 'HomeController@cities_list');
// Packing list
Route::get('packing-list', 'HomeController@tbl_packing');
// Cutting list
Route::get('cutting-list', 'HomeController@tbl_cutting');  
// Single product details  
Route::get('product', 'CustomerProductController@product_detail');
// Products list
Route::get('product-list', 'HomeController@product_list');
// Product paacking method
Route::get('product-packaging-method', 'HomeController@product_packaging_method');

// Coupon API Endpoint
Route::get('coupon-validate', 'CouponController@coupon_validate');

// Countries List
Route::get('countries-list', 'CountryController@get_country_list');
// State List by Country id
Route::get('states-by-country/{id}', 'CountryController@get_states_by_country');
// Cities List by State id
Route::get('cities-by-state/{id}', 'CountryController@get_cities_by_state');
// Neighborhoods List by city id
Route::get('neighborhood-by-city/{id}', 'CountryController@get_neighborhood_by_city');

// VAT Tax API Endpoint
Route::get('vat-tax', 'HomeController@vat_tax_api');

// Delivery Fee Api Endpoint
Route::get('delivery-fee', 'CountryController@delivery_fee');

// Social Links Api Endpoint
Route::get('social-links', 'SettingsController@social_links');

// Help & Privacy Api Endpoint
Route::get('help-privacy', 'SettingsController@help_privacy');