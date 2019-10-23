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

Route::get('/','welcom@index');
Route::get('/welcome' , function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/create_system' , 'create_system_1@index');
Route::post('/create_system' , 'create_system_1@create_system');

Route::get('/add_info' , 'create_system_2@index'); 
Route::post('/add_info' , 'create_system_2@add_info_to_system'); 

Route::get('/my_system' , 'my_system@index');
Route::post('/my_system/add_new_data' , 'my_system@add_new_data');
Route::post('/my_system/get_data' , 'my_system@get_data');

Route::get('/sales' , 'sales@index');
Route::post('/sales/sales_for_today' , 'sales@sales_for_today');
Route::post('/sales/sales_for_sp_day' , 'sales@sales_for_sp_day');
Route::post('/sales/sales_for_this_month' , 'sales@sales_for_this_month');
Route::post('/sales/sales_for_sp_month' , 'sales@sales_for_sp_month');
Route::post('/sales/sales_for_this_year' , 'sales@sales_for_this_year');
Route::post('/sales/sales_for_sp_year' , 'sales@sales_for_sp_year');
Route::post('/sales/sellers' , 'sales@sales_for_seller');



Route::get('/edit_system' , 'edit_system@index');
Route::post('/edit_system' , 'edit_system@edit_system');

Route::get('/edit_system_1' , 'edit_system@edit_system');

Route::get('/contact_us' , function(){
    return view('/contact_us');
});
Route::get('/about_us' , function(){
    return view('/about_us');
});
