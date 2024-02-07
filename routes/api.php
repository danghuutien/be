<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespace =  'App\Http\Controllers';
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::namespace($namespace)->name('admin.')->group(function(){
    Route::match(['GET', 'POST'], 'login', 'AdminController@login')->name('login');
    Route::match(['GET', 'POST'], 'logout', 'AdminController@logout')->name('logout');
});
