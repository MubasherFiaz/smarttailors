<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.front');
// });


//frontend routes
Route::get('/', 'FrontendController@in');
Route::get('/tailor/{name}', 'FrontendController@tailor_details');
 
Route::get('about-us', 'FrontendController@about_us')->name('about-us');
Route::get('privacy', 'FrontendController@privacy')->name('privacy');
Route::get('faq', 'FrontendController@faq')->name('faq');
Route::get('tailors', 'FrontendController@tailors')->name('tailors');
Route::post('get-tailors', 'FrontendController@search_tailors')->name('get-tailors');
Route::get('our-working', 'FrontendController@our_working')->name('our-working');
Route::get('contact-us', 'FrontendController@contact_us')->name('contact-us');
Route::get('choose', 'FrontendController@choose')->name('choose');
Route::get('register', 'FrontendController@choose')->name('register');
Route::get('register-as-tailor', 'FrontendController@r_as_tailor')->name('register-as-tailor');

Route::post('/register-as-tailor', 'FrontendController@create_tailor')->name('register-as-tailor');
Route::post('register-as-user', 'FrontendController@create_user')->name('register-as-user');


Route::get('register-as-user', 'FrontendController@r_as_user')->name('register-as-user');

Route::get('shop', 'FrontendController@in');

Route::get('shop-create', 'FrontendController@create');

Route::post('store-shop', 'FrontendController@store');




Route::get('/map', 'HomeController@map')->name('map');



Auth::routes();
//order routes
Route::post('add-order', 'OrderController@add_order')->name('add-order');


//chat routes
Route::get('/message', 'HomeController@message')->name('message');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/message/{id}', 'HomeController@getMessage')->name('message');

Route::post('message', 'HomeController@sendMessage');


//dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/update-profile', 'ProfileController@update')->name('update-profile');
Route::post('/update-profile-password', 'ProfileController@update_password')->name('update-profile-password');

//gallery
Route::get('gallery', 'GalleryController@index');
Route::post('add-gallery', 'GalleryController@store')->name('add-gallery');
Route::get('delete-img/{id}', 'GalleryController@destroy')->name('delete-img');


//description
Route::post('update-description', 'ProfileController@update_description')->name('update-description');
Route::post('update-search', 'ProfileController@update_search')->name('update-search');



//measurement setting
Route::get('measurement-setting', 'MeasurementController@index');
Route::post('add-cloth-type', 'MeasurementController@add_cloth_type')->name('add-cloth-type');
Route::post('add-measurement-part', 'MeasurementController@add_measurement_part')->name('add-measurement-part');

Route::get('delete-measurement-part/{id}', 'MeasurementController@delete_mea')->name('delete-measurement-part');
Route::get('delete-type/{id}', 'MeasurementController@delete_type')->name('delete-type');
Route::get('update-measurement-part/{id}', 'MeasurementController@edit_mea')->name('update-measurement-part');
Route::get('update-cloth-type/{id}', 'MeasurementController@edit_type')->name('update-cloth-type');

Route::post('edit-cloth-type', 'MeasurementController@update_type')->name('edit-cloth-type');
Route::post('edit-measurement-part', 'MeasurementController@update_mea')->name('edit-measurement-part');




///Admin Custumer Details 

Route::get('all-custumer', 'AdminController@all_custumers');
Route::put('change_status/{email}', 'AdminController@update_custumer');



///Admin Tailors Details 
Route::get('all-tailors', 'AdminController@all_tailors');





//custumer measurement Settings
Route::get('custumer-measurements', 'CustumerController@measurement');
Route::post('get-category', 'CustumerController@get_category');
Route::post('show-category', 'CustumerController@show_category')->name('show-category');
Route::post('save-measurements', 'CustumerController@save_measurements');




///pricing of tailors
Route::get('pricing', 'PricingController@index');
Route::post('add-new-category', 'PricingController@addcategory')->name('add-new-category');
Route::post('set-price', 'PricingController@set_price')->name('set-price');;
Route::get('delete-price-details/{id}', 'PricingController@delete_price_category')->name('delete-price-details');



///tailor orders


Route::get('order', 'OrderController@tailor_order')->name('order');
Route::put('change_order_status/{invoice_no}', 'OrderController@update_status');
Route::put('update_payment/{invoice_no}', 'OrderController@update_pay');
Route::get('custumer-measurement-details/{name}', 'OrderController@custumer_measurement_details')->name('custumer-measurement-details');
Route::post('custumer-measurement-details/mea-cou', 'OrderController@get_c_category')->name('mea-cou');
Route::get('get-order-details/{id}', 'OrderController@get_order_details')->name('get-order-details');
Route::get('get_order_c_details/{id}', 'OrderController@get_order_c_details')->name('get_order_c_details');


///custumer order routes
Route::get('our-order', 'OrderController@custumer_order')->name('our-order');