<?php

use Illuminate\Support\Facades\Route;
 
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;

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
    $customers=App\Models\Customer::all();
    return view('home', compact('customers'));
})->middleware("auth");

Route::resource('customer', CustomerController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function(){
    $user=Auth::user();
    $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    $success['name'] =  $user->name;
    return view('home', $success);
}
)->name('authhome');

