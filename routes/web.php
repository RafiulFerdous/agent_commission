<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\FinalInvoiceController;

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

//Route::get('/', function () {
   // return view('welcome');
//});


Route::get('/', function () {
    return view('auth.login');
});


Route::resource('/agent',AgentController ::class);
Route::resource('/patient',PatientController ::class);
Route::resource('/service',ServiceController ::class);
Route::resource('/bill',BillController ::class);
Route::get('/finalinvoice/{id}',[FinalInvoiceController::class, 'invoice']);

Route::get('/invoices/{id}',[BillController::class,'invoice']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
