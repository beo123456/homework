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


//// XÂY DỰNG ROUTE PROJECT
///Route Frontend
Route::get('','frontend\IndexController@GetIndex')->name('FrontendIndex');
Route::get('about','frontend\IndexController@GetAbout')->name('FrontendAbout');
Route::get('contact','frontend\IndexController@GetContact')->name('FrontendContact');
Route::get('{slug_cate}.html','frontend\IndexController@GetPrdCate')->name('FrontendPrdCate');
Route::get('filter','frontend\IndexController@GetFilter')->name('FrontendFilter');

// product
Route::group(['prefix' => 'product'], function(){
    Route::get('{slug_prd}','frontend\ProductController@GetDetail')->name('FrontendDetail');
    Route::get('','frontend\ProductController@GetShop')->name('FrontendProduct');
});
// checkout
Route::group(['prefix' => 'checkout'], function(){
    Route::get('','frontend\CheckoutController@GetCheckout')->name('FrontendCheckout');
    Route::post('','frontend\CheckoutController@PostCheckout');
    
    Route::get('complete/{order_id}','frontend\CheckoutController@GetComplete');
});
// cart
Route::group(['prefix' => 'cart'], function(){
    Route::get('','frontend\CartController@GetCart')->name('FrontendCart');
    route::get('add','frontend\CartController@AddCart')->name('Addcart');
    route::get('update/{rowId}/{quantity}','frontend\CartController@UpdateCart');
    route::get('delete/{rowId}','frontend\CartController@DeleteCart')->name('DeleteCart');
});



///Route Backend
Route::get('login','backend\LoginController@GetLogin')->middleware('CheckLogout');
Route::post('login','backend\LoginController@PostLogin');


Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function(){
    Route::get('','backend\IndexController@GetIndex')->name('Admin');
    Route::get('logout','backend\IndexController@Logout')->name('logout');

    // category
    Route::group(['prefix' => 'category'], function(){
        Route::get('','backend\CategoryController@GetCategory')->name('BackendCategory');
        Route::post('','backend\CategoryController@PostCategory');
        Route::get('edit/{id_cate}','backend\CategoryController@GetEditCategory')->name('EditCategory');
        Route::post('edit/{id_cate}','backend\CategoryController@PostEditCategory');
        Route::get('delete/{id_cate}','backend\CategoryController@DeleteCategory')->name('DeleteCategory');
    });

    // user
    Route::group(['prefix' => 'user'], function(){
        Route::get('adduser','backend\UserController@GetAddUser')->name('AddUser');
        Route::post('adduser','backend\UserController@PostAddUser');
        Route::get('edituser/{id_user}','backend\UserController@GetEditUser')->name('EditUser');
        Route::post('edituser/{id_user}','backend\UserController@PostEditUser');
        Route::get('','backend\UserController@GetListUser')->name('BackendUser');
        Route::get('DelUser/{id_user}','backend\UserController@DelUser')->name('DelUser');
    });

    //product
    Route::group(['prefix' => 'product'], function(){
        Route::get('editproduct/{prd_id}','backend\ProductController@GetEditProduct')->name('EditProduct');
        Route::post('editproduct/{prd_id}','backend\ProductController@PostEditProduct');
        Route::get('addproduct','backend\ProductController@GetAddProduct')->name('AddProduct');
        Route::post('addproduct','backend\ProductController@PostAddProduct');
        Route::get('','backend\ProductController@GetListProduct')->name('BackendProduct');
        Route::get('DeleteProduct/{prd_id}','backend\ProductController@DeleteProduct')->name('DeleteProduct');
    });

    // order
    Route::group(['prefix' => 'order'], function(){
        Route::get('','backend\OrderController@GetOrder')->name('BackendOrder');
        Route::get('processed','backend\OrderController@GetProcessed')->name('Processed');
        Route::get('paid/{order_id}','backend\OrderController@Paid')->name('Paid');
        Route::get('detailorder/{order_id}','backend\OrderController@GetDetailOrder')->name('DetailOrder');
    });
});
