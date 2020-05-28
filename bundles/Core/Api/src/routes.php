<?php

use Core\Api\Models\Customer;
use Illuminate\Support\Facades\Route;


Route::prefix('core-api')->group(function () {
    Route::get('/', function () {
        $customers = Customer::all();
        return view('core-api::list', compact('customers'));
    })->name('core-api.customers');
    Route::get('/add-customer', function () {
        return view('core-api::create-customer');
    })->name("core-api.create-customer");
    Route::get('/add-product', function () {
        $customers = Customer::pluck('firstName', 'id');
        return view('core-api::create-product', compact('customers'));
    })->name("core-api.create-product");

    Route::resource('/api/customer', 'Core\Api\Controllers\CustomerController')->names('core-api.customer');
    Route::resource('/api/product', 'Core\Api\Controllers\ProductController')->names('core-api.product');
});


