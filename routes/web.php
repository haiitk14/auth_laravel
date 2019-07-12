<?php
use App\Http\Middleware\Admin;
use App\Http\Middleware\SuperAdmin;

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

    //Login routes
    Route::get('login', ['uses' => 'Admin\AuthController@login', 'as' => 'adminLogin']);
    Route::post('login', ['uses' => 'Admin\AuthController@postLogin', 'as' => 'postlogin']);
    // Route::post('profile', ['uses' => 'Admin\AuthController@profile', 'as' => 'admin.auth.profile']);
    Route::get('logout', ['uses' => 'Admin\AuthController@logout', 'as' => 'adminLogout']);


    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', 'Admin\CustomerController@index')->name('admin.customer')->middleware(Admin::class);
        Route::post('/create', 'Admin\CustomerController@create')->name('admin.customer.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\CustomerController@update')->name('admin.customer.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\CustomerController@destroy')->name('admin.customer.destroy')->middleware(Admin::class);
   
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product')->middleware(Admin::class);
        Route::post('/create', 'Admin\ProductController@create')->name('admin.product.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\ProductController@destroy')->name('admin.product.destroy')->middleware(Admin::class);
    });
    Route::group(['prefix' => 'manufature'], function() {
        Route::get('/', 'Admin\ManufatureController@index')->name('admin.manufature')->middleware(Admin::class);
        Route::post('/create', 'Admin\ManufatureController@create')->name('admin.manufature.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\ManufatureController@update')->name('admin.manufature.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\ManufatureController@destroy')->name('admin.manufature.destroy')->middleware(Admin::class);
    });
    Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/', 'Admin\IngredientController@index')->name('admin.ingredient')->middleware(Admin::class);
        Route::post('/create', 'Admin\IngredientController@create')->name('admin.ingredient.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\IngredientController@update')->name('admin.ingredient.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\IngredientController@destroy')->name('admin.ingredient.destroy')->middleware(Admin::class);
    });
    Route::group(['prefix' => 'formula'], function() {
        Route::get('/', 'Admin\FormulaController@index')->name('admin.formula')->middleware(Admin::class);
        Route::post('/create', 'Admin\FormulaController@create')->name('admin.formula.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\FormulaController@update')->name('admin.formula.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\FormulaController@destroy')->name('admin.formula.destroy')->middleware(Admin::class);
    });
    Route::group(['prefix' => 'comment'], function() {
        Route::get('/', 'Admin\CommentController@index')->name('admin.comment')->middleware(Admin::class);
        Route::post('/create', 'Admin\CommentController@create')->name('admin.comment.create')->middleware(Admin::class);
        Route::post('/update', 'Admin\CommentController@update')->name('admin.comment.update')->middleware(Admin::class);
        Route::delete('/destroy', 'Admin\CommentController@destroy')->name('admin.comment.destroy')->middleware(Admin::class);
    });

    Route::group(['prefix' => 'report'], function() {
        Route::get('/salesorder', 'Admin\SalesOrderController@index')->name('admin.report.salesorder')->middleware(Admin::class);
      
    });
});
Route::get('/', function () {
    return redirect('admin');
});

Auth::routes();

