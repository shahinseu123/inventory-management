<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user' => 'API\UserController',]);
Route::apiResources(['rootcustomer' => 'API\RootCustomerController']);
Route::apiResources(['reseller' => 'API\ResellerController']);
Route::apiResources(['vipcustomer' => 'API\VipCustomerController']);
Route::apiResources(['electronic' => 'API\ElectronicController']);
Route::apiResources(['vendor' => 'API\VendorController']);
Route::apiResources(['category' => 'API\CategoryController']);
Route::apiResources(['invoice' => 'API\InvoiceController']);
Route::apiResources(['invoice-product' => 'API\InvoiceProductController']);
Route::apiResources(['bill' => 'API\BillController']);
Route::apiResources(['billproduct' => 'API\BillProductController']);
Route::apiResources(['revenue' => 'API\RevenueController']);
Route::apiResources(['payment' => 'API\PaymentController']);

