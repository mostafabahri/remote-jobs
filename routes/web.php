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

Route::get('/', 'HomeController')->name('home');

Route::resource('/jobs', 'JobController');



Route::get('/stripe/success/{session_id}', 'StripeReturnController@success')->name('stripe.return.success');
Route::get('/stripe/cancel/{session_id}', 'StripeReturnController@cancel')->name('stripe.return.cancel');


Route::get('/checkout/{job}', 'CheckoutController')->name('checkout');

Route::resource('/companies', 'CompanyController')->only('show');