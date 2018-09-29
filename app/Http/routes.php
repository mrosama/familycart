<?php

/*
 *  Set up locale and locale_prefix if other language is selected
 */
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {
    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}
/*
 * Set up route patterns - patterns will have to be the same as in translated route for current language
 */


// Get Ajax Data
Route::get('getSizes', 'GetDataController@getSizes');
Route::get('getCities', 'GetDataController@getCities');
Route::get('getTypes', 'GetDataController@getTypes');
Route::get('getColors', 'GetDataController@getColors');
Route::get('getBrands', 'GetDataController@getBrands');
Route::get('getProduct', 'GetDataController@getProduct');
Route::get('getBranches', 'GetDataController@getBranches');
Route::get('deleteProductColor', 'GetDataController@deleteProductColor');
Route::get('getChargeValue', 'GetDataController@getChargeValue');



// ========== Site Route =========
//Route::group(array('prefix' => Config::get('app.locale_prefix')), function() {
Route::group(array('prefix' => Config::get('app.locale_prefix') , 'middleware' => 'web'), function() {

   /* Route::get('/', function () {
        Route::resource('/', 'HomeController');
    });*/
    Route::get('/', 'Site\HomeController@index');
    Route::get('/lang/{lang}', 'Site\HomeController@changeLang');
    Route::get('supports', 'Site\HomeController@supports');
    Route::get('support/section/{id}', 'Site\HomeController@supportSection');
    Route::get('support/{id}', 'Site\HomeController@supportQuestion');
    Route::post('support_search', 'Site\HomeController@supportSearch');
    Route::get('privacy', 'Site\HomeController@privacy');
    Route::get('contactUs', 'Site\HomeController@contactUs');
    Route::post('contactUs/sendMsg', 'Site\HomeController@sendMsg');
    Route::get('all_categories', 'Site\HomeController@all_categories');
    Route::get('offers', 'Site\OffersController@show');
    Route::get('search', 'Site\HomeController@search');
    Route::get('page/{page_id}', 'Site\PagesController@show');
    Route::post('newsletter', 'Site\HomeController@newsletter');
    Route::get('/product/{id}', 'Site\ProductsController@Show');
    Route::get('type/{type_id}', 'Site\ProductsController@types');
    Route::get('/product/{id}/{color_id}', 'Site\ProductsController@ProductColor');
    Route::get('section/{section_id}/{section_name?}', 'Site\ProductsController@sections');
    Route::get('branch/{branch_id}/{branch_name}', 'Site\ProductsController@branches');

    // cart
    Route::get('cart', 'Site\CartController@show_cart');
    Route::get('buy_now/{id}', 'Site\CartController@buy_now');
    Route::get('addToCart', 'Site\CartController@add_to_cart');
    Route::get('addToSellerCart', 'Site\CartController@add_to_seller_cart');
    Route::get('updateQuantity', 'Site\CartController@updateQuantity');
    Route::get('cart/remove_item/{id}', 'Site\CartController@remove_item');
    Route::get('AddGiftToCart', 'Site\CartController@AddGiftToCart');
    Route::get('RemoveGiftFromCart', 'Site\CartController@RemoveGiftFromCart');
    Route::get('addFastChargeToCart', 'Site\CartController@addFastChargeToCart');
    Route::get('removeFastChargeFromCart', 'Site\CartController@removeFastChargeFromCart');
    Route::get('addToColorCart', 'Site\CartController@addToColorCart');
    Route::get('shipping', 'Site\ShippingController@show_shipping');


    // User Profile

    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'user\UserController@confirm'
    ]);
    Route::group(['middleware' => 'auth'], function() {
        Route::get('profile/edit', 'user\UserProfileController@editProfile');
        Route::get('profile/myOrder', 'user\UserProfileController@showOrder');
        //Print And PDF javascript
        Route::get('profile/orderPrint/{id}', 'user\UserProfileController@orderPrint');
        // PDF
        Route::get('profile/orderPDF/{id}', 'user\UserProfileController@orderPDF');
        // Profile 
        Route::get('profile/rating/{order_id}/{product_id}', 'user\UserProfileController@createRating');
        Route::post('profile/rating', 'user\UserProfileController@saveRating');
        Route::get('profile/return', 'user\UserProfileController@productReturn');
        Route::post('profile/return', 'user\UserProfileController@doProductReturn');
        Route::get('profile/editPicture', 'user\UserProfileController@editPicture');
        Route::post('profile/updatePicture', array('uses' => 'user\UserProfileController@updatePicture', 'as' => 'updatePicture'));
        Route::post('profile/updateProfile', array('uses' => 'user\UserProfileController@updateProfile', 'as' => 'updateProfile'));
        Route::get('profile/myPurchases', 'user\UserProfileController@showPurchases');
        Route::post('profile/changePassword', ['uses' => 'user\UserProfileController@changePassword', 'as' => 'changePass']);
        Route::get('profile/addresses', 'user\UserProfileController@addresses');
        Route::post('profile/addresses/create', 'user\UserProfileController@create_address');
        Route::get('profile/addresses/delete/{id}', 'user\UserProfileController@delete_address');
        Route::get('profile/addresses/edit/{id}', 'user\UserProfileController@edit_address');
        Route::post('profile/addresses/update/{id}', 'user\UserProfileController@update_address');
        Route::get('profile/newsletter', 'user\UserProfileController@newsletter');
        Route::post('profile/newsletter/update', 'user\UserProfileController@update_newsletter');
        Route::get('logout', 'user\UserController@logout');
        //shipping
        Route::post('shipping/store', 'Site\ShippingController@store_shipping');
        Route::post('shipping/update/{id}', 'Site\ShippingController@update_shipping');
        //checkout
        Route::post('checkout/pay', 'Site\CheckoutController@pay');
        Route::get('checkout/success', 'Site\CheckoutController@success');
        Route::get('getUserData', 'site\ShippingAddressesController@getUserData');
        Route::post('shipping_address/store', ['uses' => 'site\ShippingAddressesController@store', 'as' => 'shipping.address']);
//    Route::post('checkout/pay', 'site\CheckoutController@pay');
//    Route::post('checkout/bankTransfer', ['uses' => 'site\CheckoutController@bankTransfer', 'as' => 'checkout.bankTransfer']);
//    Route::get('checkout/CreditTransfer', 'site\CheckoutController@CreditTransfer');
        Route::post('paypal/credit', ['as' => 'paypalCredit', 'uses' => 'site\PaypalCheckoutController@buyPaypal']);
        Route::get('paypal/credit/cancel', [ 'uses' => 'site\PaypalCheckoutController@cancel', 'as' => 'credits.cancel']);
        Route::post('paypal/credit/success', [ 'uses' => 'site\PaypalCheckoutController@success', 'as' => 'credits.success']);
        Route::get('get_total_price_with_charge', 'site\CheckoutController@total_price_with_charge');
    });
    Route::group(['middleware' => 'guest', 'web'], function() {
        Route::get('login', array('uses' => 'user\UserController@showLogin'));
        Route::post('login', array('uses' => 'user\UserController@doLogin'));
        Route::post('shippingLogin', array('uses' => 'user\UserController@shippingLogin'));
        Route::post('visitor_login', array('uses' => 'user\UserController@doVisitorLogin'));
        Route::get('register', array('uses' => 'user\UserController@showSignup'));
        Route::post('register', array('uses' => 'user\UserController@doSignup'));
        Route::get('forgetPassword', array('uses' => 'user\UserController@getForgetPassword'));
        Route::post('forgetPassword', array('uses' => 'user\UserController@forgetPassword'));
        Route::get('resetPassword/{pass_code}', array('uses' => 'user\UserController@getResetPassword'));
        Route::post('resetPassword', array('uses' => 'user\UserController@resetPassword'));
        Route::post('fastSignup', ['uses' => 'site\ShippingAddressesController@fastSignup', 'as' => 'fastSignup']);
    });
    Route::get('logout', 'user\UserController@logout');
});


// ========== Admin Route =========
Route::get('admin/login', 'Admin\ProfileController@showLogin');
Route::post('admin/doLogin', 'Admin\ProfileController@doLogin');
Route::get('admin/logout', 'Admin\ProfileController@logout');
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'), function() {

    Route::resource('home', 'HomeController');
    Route::resource('supports', 'SupportsController');
    //== Admin Profile == //
    Route::get('editProfile', 'ProfileController@editProfile');
    Route::post('profile/update', 'ProfileController@updateProfile');
    Route::post('password/update', 'ProfileController@updatePassword');

    Route::get('supports/show/questions/{id}', 'SupportsController@showQuestions');
    Route::post('supports/store/question', 'SupportsController@storeQuestion');
    Route::get('supports/edit/question/{id}', 'SupportsController@editQuestion');
    Route::post('supports/update/question/{id}', 'SupportsController@updateQuestion');
    Route::get('supports/delete/question/{id}', 'SupportsController@deleteQuestion');
    Route::resource('sections', 'SectionsController');
    Route::get('sections/status/show/{id}', 'SectionsController@statusShow');
    Route::get('sections/status/hide/{id}', 'SectionsController@statusHide');
    Route::resource('branches', 'BranchesController');
    Route::resource('types', 'TypesController');
    Route::resource('brands', 'BrandsController');
    Route::resource('products', 'ProductsController');
    Route::resource('sellers', 'SellersController');
    Route::resource('colors', 'ColorsController');
    Route::resource('sizes', 'SizesController');
    Route::resource('countries', 'CountriesController');
    Route::resource('cities', 'CitiesController');
    Route::resource('users', 'UsersController');
    Route::resource('productReturn', 'ProductReturnController');
    Route::get('users/type/user', 'UsersController@getUsers');
    Route::get('users/type/admin', 'UsersController@getAdmins');
    Route::resource('sliders', 'SlidersController');
    Route::resource('settings', 'SettingsController');
    Route::get('newsletters/create_letter', 'NewslettersController@create_letter');
    Route::post('newsletters/send_letter', 'NewslettersController@send_letter');
    Route::resource('newsletters', 'NewslettersController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('features', 'FeaturesController');
    Route::resource('offers', 'OffersController');
    Route::resource('ads', 'AdsController');
    Route::resource('best_offers', 'Best_offersController');
    Route::resource('ads_offers', 'Ads_offersController');
    Route::resource('pages', 'PagesController');
    Route::get('orders', 'OrdersController@index');
    Route::get('orders/show/{id}', 'OrdersController@show');
    Route::get('orders/status/{id}', 'OrdersController@status');
    Route::post('orders/edit_status/{id}', 'OrdersController@edit_status');
    Route::get('orders/delete/{id}', 'OrdersController@delete');
    Route::post('users/updatePassword/{id}', ['uses' => 'UsersController@updatePassword', 'as' => 'admin.users.updatePassword']);
    Route::get('products/sellers/{id}', 'ProductsController@sellers');
    Route::post('products/add_seller/{id}', 'ProductsController@add_seller');
    Route::get('products/edit_seller/{id}', 'ProductsController@edit_seller');
    Route::post('products/update_seller/{id}', 'ProductsController@update_seller');
    Route::get('products/delete_seller/{id}', 'ProductsController@delete_seller');
    Route::get('products/offers/{id}', 'ProductsController@offers');
    Route::post('products/add_offer/{id}', 'ProductsController@add_offer');
    Route::post('products/update_offer/{id}', 'ProductsController@update_offer');
    Route::get('products/delete_video/{id}', 'ProductsController@delete_video');
    Route::get('products/delete_image/{id}', 'ProductsController@delete_image');
    Route::get('products/show_colors/{id}', 'ProductsController@show_colors');
    Route::post('products/add_colors/{id}', 'ProductsController@add_colors');
    Route::get('products/edit_color/{id}', 'ProductsController@edit_color');
    Route::get('products/delete_color/{id}', 'ProductsController@delete_color');
    Route::post('products/update_colors/{id}', 'ProductsController@update_color');
    Route::get('products/delete_color_image/{id}', 'ProductsController@delete_color_image');
    Route::get('products/edit_size/{id}', 'ProductsController@edit_size');
    Route::post('products/add_sizes/{id}', 'ProductsController@add_sizes');
    Route::get('products/delete_size/{id}', 'ProductsController@delete_size');
    Route::get('products/show_sizes/{id}', 'ProductsController@show_sizes');
    Route::post('products/update_size/{id}', 'ProductsController@update_size');
    Route::post('products/add_advantages/{id}', 'ProductsController@add_advantages');
    Route::get('products/edit_advantage/{id}', 'ProductsController@edit_advantage');
    Route::get('products/show_advantages/{id}', 'ProductsController@show_advantages');
    Route::post('products/update_advantage/{id}', 'ProductsController@update_advantage');
    Route::get('products/show_colors_sizes/{id}', 'ProductsController@show_colors_sizes');
    Route::post('products/add_colors_sizes/{id}', 'ProductsController@add_colors_sizes');
    Route::get('products/edit_color_size/{id}', 'ProductsController@edit_color_size');
    Route::post('products/update_color_size/{id}', 'ProductsController@update_color_size');
    Route::get('products/delete_color_size/{id}', 'ProductsController@delete_color_size');
});


