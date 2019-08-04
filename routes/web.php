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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//===========================================================================
//Profile Route

Route::get('/profile', [
    'uses' => 'HomeController@profile',
    'as' => 'profile',
    'middleware' => 'auth'
]);

//============================================================================
//Wallet Route

Route::get('/wallets', [
    'uses' => 'HomeController@wallets',
    'as' => 'wallets',
    'middleware' => 'auth'
]);

//============================================================================
//Deposit Route

Route::post('/sell-btc', [
    'uses' => 'HomeController@sellBTC',
    'as' => 'sell.btc'
]);

//============================================================================
//Withdraw Route

Route::post('/withdraw-btc', [
    'uses' => 'HomeController@withdrawBTC',
    'as' => 'withdraw.btc'
]);

//============================================================================
//Buying Route

Route::post('/buying-btc', [
    'uses' => 'HomeController@buyingBTC',
    'as' => 'buying.btc'
]);

//============================================================================
//User Profile Route

Route::get('/user-profile/{id}', [
    'uses' => 'HomeController@userProfile',
    'as' => 'user-profile',
    'middleware' => 'auth'
]);

Route::get('/admin-view-user/{id}', [
    'uses' => 'HomeController@adminView',
    'as' => 'admin-view-user'
]);

//=============================================================================
//Seller Consent Route

Route::post('/seller-consent', [
    'uses' => 'HomeController@sellerConsent',
    'as' => 'seller.consent'
]);

//============================================================================

//=============================================================================
//Delete Interest Route

Route::post('/delete-interest', [
    'uses' => 'HomeController@deleteInt',
    'as' => 'delete.int'
]);

//============================================================================
//Confirm Transaction Route

Route::post('/confirm-tx', [
    'uses' => 'HomeController@confirmTx',
    'as' => 'confirm.tx'
]);

//============================================================================
//Confirm Payment Route

Route::post('/confirm-payment', [
    'uses' => 'HomeController@confirmPayment',
    'as' => 'confirm.payment'
]);

//============================================================================
//Confirm Received Route

Route::post('/confirm-received', [
    'uses' => 'HomeController@confirmReceived',
    'as' => 'confirm.received'
]);

//============================================================================
