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

Route::group(['prefix' => 'admin'], function () {

    //404
    Route::get('/404', 'Admin\NotFoundController@index');

    //default
    Route::get('/', ['uses' => 'Admin\DashboardController@index','as' => 'adminHome']);

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', 'Admin\CustomerController@index')->name('admin.customer');
        Route::post('/create', 'Admin\CustomerController@create')->name('admin.customer.create');
        Route::post('/update', 'Admin\CustomerController@update')->name('admin.customer.update');
        Route::delete('/destroy', 'Admin\CustomerController@destroy')->name('admin.customer.destroy');
   
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product');
        Route::post('/create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::delete('/destroy', 'Admin\ProductController@destroy')->name('admin.product.destroy');
    });
    Route::group(['prefix' => 'manufature'], function() {
        Route::get('/', 'Admin\ManufatureController@index')->name('admin.manufature');
        Route::post('/create', 'Admin\ManufatureController@create')->name('admin.manufature.create');
        Route::post('/update', 'Admin\ManufatureController@update')->name('admin.manufature.update');
        Route::delete('/destroy', 'Admin\ManufatureController@destroy')->name('admin.manufature.destroy');
    });
    Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/', 'Admin\IngredientController@index')->name('admin.ingredient');
        Route::post('/create', 'Admin\IngredientController@create')->name('admin.ingredient.create');
        Route::post('/update', 'Admin\IngredientController@update')->name('admin.ingredient.update');
        Route::delete('/destroy', 'Admin\IngredientController@destroy')->name('admin.ingredient.destroy');
    });
    Route::group(['prefix' => 'formula'], function() {
        Route::get('/', 'Admin\FormulaController@index')->name('admin.formula');
        Route::post('/create', 'Admin\FormulaController@create')->name('admin.formula.create');
        Route::post('/update', 'Admin\FormulaController@update')->name('admin.formula.update');
        Route::delete('/destroy', 'Admin\FormulaController@destroy')->name('admin.formula.destroy');
    });
    Route::group(['prefix' => 'comment'], function() {
        Route::get('/', 'Admin\CommentController@index')->name('admin.comment');
        Route::post('/create', 'Admin\CommentController@create')->name('admin.comment.create');
        Route::post('/update', 'Admin\CommentController@update')->name('admin.comment.update');
        Route::delete('/destroy', 'Admin\CommentController@destroy')->name('admin.comment.destroy');
    });

    Route::group(['prefix' => 'report'], function() {
        Route::get('/salesorder', 'Admin\SalesOrderController@index')->name('admin.report.salesorder');
      
    });
});
Route::get('/', function () {
    return redirect('admin');
});
