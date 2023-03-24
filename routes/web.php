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
Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});
Route::group(['middleware'=>['auth']],function(){
Route::get('sales/reports_day','ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date','ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results','ReportController@report_results')->name('report.results');

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');
Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases')->except(['edit', 'update', 'destroy']);
Route::resource('sales', 'SaleController')->names('sales')->except(['edit', 'update', 'destroy']);

Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::resource('busines', 'BusinesController')->names('busines')->only(['index', 'update']);

Route::resource('printers', 'PrinterController')->names('printers')->only(['index', 'update']);

Route::get('purchases/upload/{id}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
//Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');

Route::get('/change-status/purchases/{id}/{status}', 'PurchaseController@change_status')->name('change.status.purchases');

//Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Route::get('/change-status/sales/{id}/{status}', 'SaleController@change_status')->name('change.status.sales');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
