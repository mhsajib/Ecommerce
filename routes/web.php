<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
        
        // Admin Section...

// Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@DeleteCategory')->name('delete.category');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@EditCategory')->name('edit.category');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@UpdateCategory')->name('update.category');

// brands

Route::get('admin/brands', 'Admin\Category\CategoryController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\CategoryController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\CategoryController@DeleteBrand')->name('delete.brand');
Route::get('edit/brand/{id}', 'Admin\Category\CategoryController@EditBrand')->name('edit.brand');
Route::post('update/brand/{id}', 'Admin\Category\CategoryController@UpdateBrand')->name('update.brand');

//sub categories
Route::get('admin/sub/categories', 'Admin\Category\CategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcategory', 'Admin\Category\CategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\CategoryController@DeletesubCategory')->name('delete.subcategory');
Route::get('edit/subcategory/{id}', 'Admin\Category\CategoryController@EditsubCategory')->name('edit.subcategory');
Route::post('update/subcategory/{id}', 'Admin\Category\CategoryController@UpdatesubCategory')->name('update.subcategory');

//coupon
Route::get('admin/coupon', 'Admin\Category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@storecoupon')->name('store.coupon');
Route::get('admin/edit/coupon/{id}', 'Admin\Category\CouponController@editcoupon')->name('edit.coupon');
Route::get('admin/delete/coupon/{id}', 'Admin\Category\CouponController@deletecoupon')->name('delete.coupon');
Route::post('admin/update/coupon/{id}', 'Admin\Category\CouponController@updatecoupon')->name('update.coupon');

//newsletter
Route::get('admin/newsletter', 'Admin\Category\CouponController@newsletter')->name('admin.newsletter');
Route::get('/delete/newsletter/{id}', 'Admin\Category\CouponController@deletenewsletter')->name('delete.newsletter');

//product route......
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');

//get sub category by ajax...........

Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcategory');

///fronted route
Route::post('store/newsletter', 'Frontend\FrontendController@storenewsletter')->name('store.newsletter');
