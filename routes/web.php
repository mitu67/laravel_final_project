<?php

use Illuminate\Support\Facades\Route;

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

                 /*FOR LOGIN [LOGIN(GET)+SUBMIT(POST)]  */
                  /*CONFIG THEKE AUTH THIK KORE NITE HOBE  */

Route::get('login' , 'Auth\LoginController@login')->name('login');
Route::post('login' , 'Auth\LoginController@authenticate')->name('login.confirm');

Route::group(['middleware' => 'auth'] , function(){



Route::get('dashboard', function () {
    return view('welcome');
});

Route::get('test', function () {
    return ('welcome');
});


Route::get('logout' , 'Auth\LoginController@logout')->name('logout');

                       /*   X   */


          /*FOR GROUP ROUTE  */

/*  
user er list show  
*/
Route::get('groups', 'UserGroupsController@index'); 
/*  
new user create 
*/
Route::get('groups/create', 'UserGroupsController@create');
/*  
create page er data group a store hobe 
*/
Route::post('groups', 'UserGroupsController@store');
/*  
user delete group page theke
*/
Route::delete('groups/{id}', 'UserGroupsController@destroy');


           /*sob alada na create kore 1 barei kora jay.[resource] use kore 
           2.CRUD autometic create resource use korle.

           */

Route::resource('users', 'UsersController' ); // route theke show baad

Route::get('users/{id}/sales', 'UserSalesController@index')->name('user.sales');

// invoice page create kore data post
Route::post('users/{id}/invoices', 'UserSalesController@createInvoice')->name('user.sales.store');
// invoice show korbo
Route::get('users/{id}/invoices/{invoice_id}', 'UserSalesController@invoice')->name('user.sales.invoice_details');

// invoice delete korbo
Route::delete('users/{id}/invoices/{invoice_id}', 'UserSalesController@destroy')->name('user.sales.destroy');

// submit korle ei root a..invoice id te product add korbo
Route::post('users/{id}/invoices/{invoice_id}', 'UserSalesController@addItem')->name('user.sales.invoices.add_item');
// invoice id te product add korbo
Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', 'UserSalesController@destroyItem')->name('user.sales.invoices.delete_item');





Route::get('users/{id}/purchases', 'UserPurchasesController@index')->name('user.purchases');

Route::get('users/{id}/payments', 'UserPaymentsController@index')->name('user.payments');
Route::post('users/{id}/payments','UserPaymentsController@store')->name('user.payments.store');
Route::delete('users/{id}/payments/{payment_id}','UserPaymentsController@destroy')->name('user.payments.destroy');



Route::get('users/{id}/receipts', 'UserReceiptsController@index')->name('user.receipts');
Route::post('users/{id}/receipts/{invoice_id?}', 'UserReceiptsController@store')->name('user.receipts.store');
Route::delete('users/{id}/receipts/{receipt_id}', 'UserReceiptsController@destroy')->name('user.receipts.destroy');





Route::resource('categories', 'CategoriesController' , ['except' => ['show']] );
Route::resource('products', 'ProductsController');

});


                 /*FOR USER CRUD(ROUTE)  */

    /*  user er list show 

Route::get('users', 'UsersController@index');
*/

     /* SINGLE user show 

Route::get('users/{id}', 'UsersController@show');
*/

      /* user create korar jonno 

Route::get('users/create', 'UsersController@create');
*/

       /*  user er submit er jonno 

Route::POST('users', 'UsersController@store');
*/

       /*user er list edit korar jonno 

Route::get('users/{id}/edit', 'UsersController@edit');
*/

         /*  edit submit korle tar action er kaj  

Route::PUT('users/{id}', 'UsersController@update');
*/

         /*  user er list show 

Route::delete('users/{id}', 'UsersController@delete');
*/

 


