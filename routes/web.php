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
Route::get('/', 'Frontend\ProductsController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');
/*
Product Route
Front End Product route
*/
Route::group(['prefix' => 'product'], function(){
Route::get('/', 'Frontend\ProductsController@index')->name('products');
Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

/*
CATEGORY ROUTE
*/
Route::get('/category', 'Frontend\CategoriesController@index')->name('categories.index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');
});
//GET REQUEST
//Route::get('/', function () {
  //  return view('welcome');
//});


//Route::get('/admin', 'AdminPagesController@indax')->name('admin.indax')

//Admin Route
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.dash');

  //Admin Auth, Login route
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login')->middleware('access');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
  //Forgot PASSWORD (Email send)
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  //Forgot PASSWORD (Reset)
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

// Product Route
Route::group(['prefix' => '/product'], function(){

  Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
  Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
  Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
  Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
  Route::post('/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
  Route::post('/destroy/{id}', 'Backend\ProductsController@destroy')->name('admin.product.delete');
  });
// Orders Route
Route::group(['prefix' => '/orders'], function(){

  Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
  Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.orders.show');
  Route::post('/destroy/{id}', 'Backend\OrdersController@destroy')->name('admin.orders.delete');
  Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
  Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
  Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeOrder')->name('admin.order.charge');
  Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');
  });
// Category Route
Route::group(['prefix' => '/catagory'], function(){

  Route::get('/create', 'Backend\CategoriesController@create')->name('admin.categories.create');
  Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
  Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
  Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');
  Route::post('/edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
  Route::post('/destroy/{id}', 'Backend\CategoriesController@destroy')->name('admin.category.delete');
  });
// Brand Route
Route::group(['prefix' => '/brand'], function(){

  Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
  Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
  Route::get('/', 'Backend\BrandsController@index')->name('admin.brand');
  Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');
  Route::post('/edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
  Route::post('/destroy/{id}', 'Backend\BrandsController@destroy')->name('admin.brand.delete');
  });
// Division Route
Route::group(['prefix' => '/division'], function(){

  Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
  Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
  Route::get('/', 'Backend\DivisionsController@index')->name('admin.division');
  Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
  Route::post('/edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
  Route::post('/destroy/{id}', 'Backend\DivisionsController@destroy')->name('admin.division.delete');
  });
// District Route
Route::group(['prefix' => '/district'], function(){

  Route::get('/create', 'Backend\DistrictController@create')->name('admin.district.create');
  Route::get('/edit/{id}', 'Backend\DistrictController@edit')->name('admin.district.edit');
  Route::get('/', 'Backend\DistrictController@index')->name('admin.district');
  Route::post('/store', 'Backend\DistrictController@store')->name('admin.district.store');
  Route::post('/edit/{id}', 'Backend\DistrictController@update')->name('admin.district.update');
  Route::post('/destroy/{id}', 'Backend\DistrictController@destroy')->name('admin.district.delete');
  });



});
//USER ROUTE
Route::group(['prefix' => '/user'], function(){
  Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
  Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
  Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
  Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
  });
//CART ROUTE
Route::group(['prefix' => '/carts'], function(){
  Route::get('/', 'Frontend\CartsController@index')->name('carts');
  Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
  Route::post('/{id}', 'Frontend\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');

  });
//CHECKOUT ROUTE
Route::group(['prefix' => '/checkout'], function(){
  Route::get('/', 'Frontend\CheckoutsController@index')->name('checkout');
  Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkout.store');
  });

//CART LOGIN
  Route::get('cartlogin/login', 'cartLogin\LoginController@showLoginForm')->name('cart.login');
  Route::post('/login/submit', 'cartLogin\LoginController@login')->name('cart.login.submit');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my_page', 'mypage@index')->name('my_page');
